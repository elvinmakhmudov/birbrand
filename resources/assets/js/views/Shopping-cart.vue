<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mənim səbətim</h2>
                    <table class="table table-hover">
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
                            <td> {{ product.options.details }}</td>
                            <td> {{ product.price }} AZN</td>
                            <td> {{ product.qty }} ədəd</td>
                            <td>
                                <button @click.prevent="deleteItem(index, product.rowId)" type="button"
                                        class="btn btn-danger">Sil
                                </button>
                            </td>
                        </tr>
                        <tr v-if="cartItems">
                            <td></td>
                            <td><b>Cəmi</b></td>
                            <td><b>{{ cartTotal }} AZN</b></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
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
            deleteItem(index, rowId) {
                return new Promise((resolve, reject) => {
                    axios.delete('/cart', {params : { rowId: rowId}}).then(function (response) {
//                        delete this.$store.state.cartItems[rowId];
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
