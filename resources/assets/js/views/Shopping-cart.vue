<template>
    <div class="layout cart">
        <div class="row">
            <div class="col s12">
                <h5>{{ $t('shoppingCard.title') }}</h5>
                <div v-if="Object.keys(cartItems).length !== 0">
                    <table class="bordered">
                        <thead>
                        <tr>
                            <th style="width: 3%">№</th>
                            <th style="width: 20%">{{ $t('shoppingCard.table.product') }}</th>
                            <th style="width: 70%"></th>
                            <th class="hide-on-small-and-down">{{ $t('shoppingCard.table.price') }}</th>
                            <th class="hide-on-small-and-down">{{ $t('shoppingCard.table.quantity') }}</th>
                            <th style="width: 5%" class="hide-on-small-and-down">{{ $t('shoppingCard.table.remove') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product,index) in cartItems">
                            <td style="width:3%" v-text="index+1"></td>
                            <td style="width: 20%">
                                <a :href="'#/product/'+product.id" class="shopping-card-image"><img
                                        :src="'/storage/'+product.options.thumbnail" width="100%"></a>
                            </td>
                            <td style="width: 70%">
                                <span
                                        class="table-order-link"><a :href="'#/product/'+product.id"> {{ product.name }}
                                </a>
                                </span>
                                <span class="table-order-link"><span class="" v-for="option, name in JSON.parse(product.options.details || '[]')">
                                    {{ $t('product.options.'+name.toLowerCase()+'.'+option) }},</span>
                                    <!--{{ '('+ getOptions(product.options.details) + ')'}}</span><span-->
                                    <span class="hide-on-med-and-up">, {{ product.qty }}, {{ product.price}} AZN</span>
                                </span>
                            </td>
                            <td class="hide-on-small-and-down"> {{ product.price }} AZN</td>
                            <td class="hide-on-small-and-down"> {{ product.qty }}</td>
                            <td style="width: 5%">
                                <a class="waves-effect waves-light" @click.prevent="deleteItem(index, product.rowId)"><i
                                        class="material-icons shopping-card-remove-btn">remove_circle</i></a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="order-panel right-align">
                        <b>{{ $t('shoppingCard.table.total') }} {{ cartTotal }} AZN</b></td>
                        <button class="btn btn-raised btn-primary" data-toggle="modal"
                                @click.prevent="buyAll()">{{ $t('shoppingCard.buyNowButton') }}
                        </button>
                    </div>
                </div>
                <h5 class="center-align empty-text" v-else>{{ $t('shoppingCard.empty') }}</h5>
            </div>
            <buyitguest :products="products" :fromCart="true"></buyitguest>
        </div>
    </div>
</template>

<script>
    import BuyItGuest from '../components/product/buyItGuest.vue';

    export default {
        components: {
            'buyitguest': BuyItGuest
        },
        data() {
            return {
                products: []
            }
        },
        mounted() {
            $(".modal").modal();
        },
        computed: {
            cartItems() {
                return this.$store.state.cartItems;
            },
            cartTotal() {
                return this.$store.state.cartTotal;
            }
        },
        methods: {
            getOptions(options) {
                var options = JSON.parse(options || '[]');
                return Object.keys(options).map(function (k) {
                    return 'product.options.' + k + '.' + options[k];
                }).join(",");
            },
            buyAll() {
                this.cartItems.forEach(function (item) {
                    var productId = item.id;
                    var options = item.options.details;
                    var amount = item.qty;
                    this.products.push({
                        productId: productId,
                        options: options,
                        amount: amount
                    })
                }.bind(this));
                var isLoggedIn = $("meta[name=login-status]").attr('content');
                if (isLoggedIn) {
                    axios.post('order', {
                        products: this.products,
                        fromCart: true
                    }).then(function (response) {
                        this.$store.state.errors.record(response.data.errors);
                        this.$store.state.messages.record(response.data.messages);
                        this.$store.state.cartItems = [];
                        $('#flash-message').modal('open');
                    }.bind(this)).catch(error => {
                        this.errors.record(error.response.data);
                    });
                } else {
                    $('#buy-it-guest').modal('open');
                }
            },
            deleteItem(index, rowId) {
                return new Promise((resolve, reject) => {
                    axios.delete('/cart', {params: {rowId: rowId}}).then(function (response) {
                        this.$store.state.cartItems.splice(index, 1);
                        this.$store.commit('setCartTotal', response.data.cart.cartTotal);
                        resolve(response);
                    }.bind(this)).catch(function (response) {
                        reject(response);
                    }.bind(this));
                })
            }
        },
    }
</script>
