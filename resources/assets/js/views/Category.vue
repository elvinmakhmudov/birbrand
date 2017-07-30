<template>
    <div class="content">
        <div class="categories">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $route.params.title}}</h2>
                </div>
                <div class="products" v-for="product in products">
                    <product-card :price="product.price" :title="product.title"></product-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: []
            }
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchData'
        },
        created() {
            this.fetchData()
        },
        methods: {
            fetchData() {
                axios.get(window.location.hash.substr(2)).then(response => this.products = response.data
            )
                console.log('Products fetched');
            }
        }
    }
</script>
