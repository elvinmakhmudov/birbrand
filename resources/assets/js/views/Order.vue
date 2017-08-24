<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mənim sifarishlerim</h2>
                    <table class="table table-striped table-hover ">
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
                            <td><a :href="'#/product/'+order.products[0].id"><img :src="order.products[0].images[0]"
                                                                                  width="20%"><span
                                    class="table-order-link">{{ order.products[0].title }}</span></a></td>
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
