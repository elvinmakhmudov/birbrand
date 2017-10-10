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
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in cartItems">
                            <td><a :href="'#/product/'+product.id">
                                <img
                                        :src="'/storage/'+product.options.thumbnail" width="20%"><span
                                    class="table-order-link">{{ product.name }}</span></a></td>
                            <td> {{ product.options.details }}</td>
                            <td> {{ product.price }} AZN</td>
                            <td> {{ product.qty }} ədəd</td>
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
            }
        }
    }
</script>
