<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mənim səbətim</h2>
                    <div v-if="Object.keys(cartItems).length !== 0">   
                    <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th>Məhsul</th>
                            <th>Seçim</th>
                            <th>Qiymət</th>
                            <th>Miqdar</th>
                            <th>Silmək</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product,index) in cartItems">
                            <td><a :href="'#/product/'+product.id">
                                <img
                                        :src="'/storage/'+product.options.thumbnail" width="20%"><span
                                    class="table-order-link">{{ product.name }}</span></a></td>
                            <td> <p v-for="(option, name) in JSON.parse(product.options.details || '[]')"> {{ name }} - {{ option }} </p></td>
                            <td> {{ product.price }} AZN</td>
                            <td> {{ product.qty }} ədəd</td>
                            <td>
                                <button @click.prevent="deleteItem(index, product.rowId)" type="button"
                                        class="btn btn-danger">Sil
                                </button>
                            </td>
                        </tr>
                        <tr >
                            <td></td>
                            <td><b>Cəmi</b></td>
                            <td><b>{{ cartTotal }} AZN</b></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                        <button class="btn btn-raised btn-primary" style="float: right" data-toggle="modal" @click.prevent="buyAll()">İndi al</button>
                    </div>
                    <p class="text-center" v-else>Səbət boşdur</p>
                </div>
            </div>
        </div>
        <buyitguest :products="products" :fromCart="true"></buyitguest>
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
                console.log("Cart items are: " + this.$cookie.get('cartItems'));
                return this.$store.state.cartItems;
            },
            cartTotal() {
                return this.$store.state.cartTotal;
            }
        },
        methods: {
            buyAll() {
                for(var key in this.cartItems) {
                    if (this.cartItems.hasOwnProperty(key)) {
                    var item = this.cartItems[key];
                    var productId = item.id;
                    var options = item.options.details;
                    var amount = item.qty;
                    this.products.push({
                        productId: productId, 
                        options: options,
                        amount:amount
                    })
                    }
                }
                var isLoggedIn = $("meta[name=login-status]").attr('content');
                if (isLoggedIn) {
                    axios.post('order', {
                        products: this.products,
                        fromCart: true
                    }).then(function (response) {
                        this.$store.state.errors.record(response.data.errors);
                        this.$store.state.messages.record(response.data.messages);
                        this.$store.state.cartItems=[];
                        $('#flash-message').modal('toggle');
                    }.bind(this)).catch(error => {
                        this.errors.record(error.response.data);
                    });
                } else {
                    $('#buy-it-guest').modal('toggle');
                }
            },
            deleteItem(index, rowId) {
                return new Promise((resolve, reject) => {
                    axios.delete('/cart', {params : { rowId: rowId}}).then(function (response) {
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
