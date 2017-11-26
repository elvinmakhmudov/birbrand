<template>
    <div class="layout cart">
        <div class="row">
            <div class="col s12">
                <h5>Mənim səbətim</h5>
                <div v-if="Object.keys(cartItems).length !== 0">
                    <table class="bordered centered">
                        <thead>
                        <tr>
                            <th>Məhsul</th>
                            <th>Qiymət</th>
                            <th>Miqdar</th>
                            <th>Silmək</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product,index) in cartItems">
                            <td class="left-align">
                                <a  :href="'#/product/'+product.id" class="shopping-card-image"><img :src="'/storage/'+product.options.thumbnail" width="20%"><span
                                        class="table-order-link">{{ product.name }}</span></a><span v-for="(option, name) in JSON.parse(product.options.details || '[]')">( {{ name

                                }} - {{ option }} )</span></td>
                            <td> {{ product.price }} AZN</td>
                            <td> {{ product.qty }} ədəd</td>
                            <td>
                                <a class="waves-effect waves-light" @click.prevent="deleteItem(index, product.rowId)"><i class="material-icons shopping-card-remove-btn">remove_circle</i></a>

                            </td>
                        </tr>
                        <tr>
                            <td><b>Cəmi</b></td>
                            <td><b>{{ cartTotal }} AZN</b></td>
                            <td></td>
                            <td>
                                <button class="btn btn-raised btn-primary" data-toggle="modal"
                                        @click.prevent="buyAll()">İndi al
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-center" v-else>Səbət boşdur</p>
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
        computed: {
            cartItems() {
                return this.$store.state.cartItems;
            },
            cartTotal() {
                return this.$store.state.cartTotal;
            }
        },
        methods: {
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
