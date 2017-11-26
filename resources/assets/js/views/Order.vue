<template>
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>{{ $t('order.title') }}</h5>
                <table class="bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ $t('order.table.product') }}</th>
                        <th>{{ $t('order.table.deliveryStatus') }}</th>
                        <th>{{ $t('order.table.orderDate') }}</th>
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
                                            class="table-order-link">{{ product.title }}</span></a><span>({{ getOptions(product)}})</span></td>
                                    <td> {{ product.pivot.price }} AZN</td>
                                    <td> {{ product.pivot.amount }}</td>
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
                  :prev-text="$t('pagination.previousButton')"
                  :next-text="$t('pagination.nextButton')"
                  :container-class="'pagination'">
        </paginate>
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
        },
        created() {
            this.fetchData()
        },
        methods: {
            getOptions(product){
                var options = JSON.parse(product.pivot.options || '[]');
                return Object.keys(options).map(function(k){return  options[k]}).join(",");
            },
            goToPage(pageNum) {
                var url = this.ordersPage.path + "?page=" + pageNum;
                axios.get(url).then(function (response) {
                        this.orders = response.data.data;
                    }.bind(this)
                )
            },
            fromNow(date) {
                moment.locale(this.$i18n.locale);
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
