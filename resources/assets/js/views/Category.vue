<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ category.title }}</h2>
                </div>
                <div class="products" v-for="product in products">
                    <product-card :product="product"></product-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import event from "../classes/Event"
    export default {
        data() {
            return {
                category: {},
                products: []
            }
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchData'
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                axios.get(window.location.hash.substr(2)).then( function(response) {
                    this.category= response.data;
                    this.products = response.data.products;
                }.bind(this)
            )
                console.log('Products fetched');
            }
        }
    }
</script>
