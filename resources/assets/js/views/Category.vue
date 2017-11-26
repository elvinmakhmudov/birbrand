<template>
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5 v-show="category.title">
                    {{ $t('categories.' + category.title + '.main') }}
                </h5>
            </div>
            <div v-for="subcategory in category.children">
                <category-card :subcategory="subcategory">
                </category-card>
            </div>
            <div class="col s12" v-if="subcategories.length > 0">
                <h2>
                    Dəbbdə
                </h2>
            </div>
            <div class="products" v-for="product in products">
                <product-card :product="product">
                </product-card>
            </div>
        </div>

        <paginate :click-handler="goToPage" :container-class="'pagination'" :next-text="'Sonra'"
                  :page-count="this.productsPage.last_page || 0" :prev-text="'Əvvəl'" ref="paginate"
                  v-show="this.productsPage.last_page > 1">
        </paginate>
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
            '$route'(to, from) {
                this.fetchData(to, from)
                //if from route and to route path before local query differ, change the page num to 0
                if (from.matched[0].path == to.matched[0].path) {
                    if (from.path != to.path) {
                        this.$refs.paginate.selected = 0;
                    }
                }
                console.log(from.matched[0].path == to.matched[0].path);
                console.log(to)
                console.log(from)
            }
        },
        created() {
            this.fetchData();
        },
        mounted() {
            this.$store.state.activeCategorySlug = this.$route.params.slug;
            var selector = '.nav-categories li';
            $(selector).removeClass('active');
            $($(selector).find(`[data-slug='${this.$store.state.activeCategorySlug}']`)).parent('li').addClass('active');
        },
        methods: {
            goToPage(pageNum) {
                var url = this.productsPage.path + "?page=" + pageNum;
                window.location.href = window.location.href.split('?')[0] + "?page=" + pageNum;
                axios.get(url).then(function (response) {
                        this.products = response.data.productsPage.data;
                    }.bind(this)
                )
            },
            fetchData(to, from) {
                axios.get(window.location.hash.substr(2)).then(function (response) {
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
