<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ slug }}</h2>
                </div>
                <div class="products" v-for="product in products">
                    <product-card :product="product" :slug="slug"></product-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            slug: ''
        },
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
                console.log(this.$route.params)
            }
        }
    }
</script>
