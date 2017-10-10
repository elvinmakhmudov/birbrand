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
                                                :src="'/storage/'+product.thumbnail" width="20%"><span
                                                class="table-order-link">{{ product.title }}</span></a></td>
                                        <td> {{ product.pivot.price }} AZN</td>
                                        <td> {{ product.pivot.amount }} ədəd</td>
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
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        data() {
            return {
                orders: []
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
            fromNow(date) {
                moment.locale('az');
                return moment(date).calendar();
            },
            fetchData() {
                axios.get('/order').then(function (response) {
                    this.orders = response.data;
                }.bind(this));
            }
        }
    }
</script>
