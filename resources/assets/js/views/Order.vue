<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mənim sifarişlərim</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Məhsul</th>
                            <th>Status</th>
                            <th>Sifariş tarixi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="order in orders">
                            <td>{{ order.id }}</td>
                            <td>
                                <table class="table table-hover">
                                    <tbody>
                                    <tr v-for="product in order.products">
                                        <td class="col-md-6 col-xs-6 col-lg-6"><a :href="'#/product/'+product.id"><img
                                                :src="'/storage/'+product.folder + '/thumbnail.jpg'" width="20%"><span
                                                class="table-order-link">{{ product.title }}</span></a></td>
                                        <td> {{ product.pivot.price }} AZN</td>
                                        <td> {{ product.pivot.amount }} ədəd</td>
                                        <td> <p v-for="(option, name) in JSON.parse(product.pivot.options || '[]')"> {{ name }} - {{ option }} </p></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>{{ order.status }}</td>

                            <td>{{ fromNow(order.created_at) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <paginate v-show="this.ordersPage.last_page > 1"
                      :page-count="this.ordersPage.last_page || 0"
                      :click-handler="goToPage"
                      :prev-text="'Əvvəl'"
                      :next-text="'Sonra'"
                      :container-class="'pagination'">
            </paginate>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        data() {
            return {
                orders: [],
                ordersPage: {}
            }
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchData'
        },
        mounted() {
            this.fetchData()
        },
        methods: {
            goToPage(pageNum) {
                var url = this.ordersPage.path +  "?page=" + pageNum;
                axios.get(url).then(function (response) {
                        this.orders = response.data.data;
                    }.bind(this)
                )
            },
            fromNow(date) {
                moment.locale('az');
                return moment(date).calendar();
            },
            fetchData() {
                axios.get('/order').then(function (response) {
                    this.orders = response.data.data;
                    this.ordersPage = response.data;
                }.bind(this));
            }
        }
    }
</script>
