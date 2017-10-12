<template>
    <div class="container">
        <div class="content">
            <div class="layout">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ category.title }}</h2>
                    </div>
                    <div v-for="subcategory in category.children">
                        <category-card :subcategory="subcategory"></category-card>
                    </div>
                    <div class="col-md-12" v-if="subcategories.length > 0">
                        <h2>Dəbbdə</h2>
                    </div>
                    <div class="products" v-for="product in products">
                        <product-card :product="product"></product-card>
                    </div>
                </div>
                <paginate v-show="this.productsPage.last_page > 1"
                        :page-count="this.productsPage.last_page || 0"
                        :click-handler="goToPage"
                        :prev-text="'Əvvəl'"
                        :next-text="'Sonra'"
                        :container-class="'pagination'">
                </paginate>
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
                products: [],
                subcategories: [],
                productsPage: {}
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
            goToPage(pageNum) {
                var url = this.productsPage.path +  "?page=" + pageNum;
                console.log(url);
                axios.get(url).then(function (response) {
                        this.products = response.data.productsPage.data;
                    }.bind(this)
                )
            },
            fetchData() {
                axios.get(window.location.hash.substr(2)).then(function (response) {
                    console.log(response.data);
                        this.category = response.data.category;
                        this.subcategories = response.data.category.children;
                        this.products = response.data.productsPage.data;
                        this.productsPage = response.data.productsPage;
                    }.bind(this)
                )
            },
            subcategoryExists() {
                return category.children.size > 0;
            }

        }
    }
</script>
