<template>
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>{{ $t('order.title') }}</h5>
                <table class="bordered">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 60%">{{ $t('order.table.product') }} </th>
                        <th style="width: 25%">{{ $t('order.table.deliveryStatus') }}</th>
                        <th style="width: 12%">{{ $t('order.table.orderDate') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="order in orders">
                        <td>{{ order.id }}</td>
                        <td>
                            <table>
                                <tbody>
                                <tr v-for="product in order.products">
                                    <td style="width: 25%">
                                        <a :href="'#/product/'+product.id"><img
                                            :src="'/storage/'+product.folder + '/thumbnail.jpg'" width="100%"></a>
                                    </td>
                                    <td style="width: 70%">
                                        <span class="table-order-link">{{ product.title}}
                                            {{ getOptions(product) }}{{ product.pivot.amount
                                            }}, {{ product.pivot.price }} AZN
                                        </span>
                                    </td>
                                    <td style="width: 30%" v-if="product.pivot.reviewable">
                                        <span>
                                            <a @click.prevent="rateProduct(order.id, product, 'like')" :href="'product/'+product.id+'/rate?like=true'"><i class="material-icons">thumb_up</i></a>
                                            <a @click.prevent="rateProduct(order.id, product, 'dislike')" :href="'product/'+product.id+'/rate?dislike=true'"><i class="material-icons">thumb_down</i></a>
                                        </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            {{ order.status }}
                            <div v-if="order.reviewable">
                                {{ $t('order.table.rate')}}
                            </div>
                        </td>

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
        mounted() {
            $(".modal").modal();
        },
        methods: {
            rateProduct(orderId, product, rate) {
                var url = "product/"+product.id+"/rate";
                axios.post(url, {
                    orderId,
                    productId: product.id,
                    rate
                }).then(function(response){
                    this.$store.state.errors.record(response.data.errors);
                    this.$store.state.messages.record(response.data.messages);
                    product.pivot.reviewable=false;
                    $("#flash-message").modal("open");
                }.bind(this));
            },
            getOptions(product) {
                var options = JSON.parse(product.pivot.options || '[]');
                var concatonated = Object.keys(options).map(function (k) {
                    return options[k]
                }).join(",");
                return concatonated ? "("+concatonated+"), " : null;
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
