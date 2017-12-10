<template>
    <div class="layout">
        <div class="row">
            <div class="col s12 m9">
                <h5 v-show="category.title">
                    {{ $t('categories.' + category.title + '.main') }}
                </h5>
            </div>
            <div class="col s12 m3">
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Sort by</a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a @click="sortBy('rating','desc')">Rating</a></li>
                    <li><a @click="sortBy('created_at','desc')">Date</a></li>
                    <li><a href="#!">two</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">three</a></li>
                    <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                    <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
                </ul>
            </div>
        </div>
        <div class="row">

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

        <paginate :click-handler="goToPage" :container-class="'pagination'" :next-text="$t('pagination.nextButton')"
                  :page-count="this.productsPage.last_page || 0" :prev-text="$t('pagination.previousButton')"
                  ref="paginate"
                  v-show="this.productsPage.last_page > 1">
        </paginate>
    </div>
</template>
<script>
    import event from "../classes/Event"
    import Vue from 'vue';


    export default {
        computed: {
//            sortBy: function (column) {
//                function compare(a, b) {
//                    if (a[column] < b[column])
//                        return -1;
//                    if (a[column]> b[column])
//                        return 1;
//                    return 0;
//                }
//
//                console.log("sorted");
//
//                this.products = this.products.sort(compare);
//            }
        },
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
                //if from route and to route path before local query differ, change the page num to 0
                if (from.matched[0].path == to.matched[0].path) {
                    if (from.path != to.path) {
                        this.$refs.paginate.selected = 0;
                    }
                }
                $('.dropdown-button').dropdown();
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
            $('.dropdown-button').dropdown();
        },
        methods: {
            sortBy(column,order) {
                var path = window.location.href.split('?')[0];
                if(typeof path === undefined){
                    var url = window.location.href
                } else {
                    var url = window.location.href.split('?')[0]
                }
                window.location.href = url + "?page=" + 1 + '&sortBy=' + column + '&inOrder=' + order;
            },
            goToPage(pageNum) {
//                var url = this.productsPage.path + "?page=" + pageNum;
//                var url = this.productsPage.path;
                this.$refs.paginate.selected = this.productsPage.current_page - 1;
                window.location.href = window.location.href.split('?')[0] + "?page=" + pageNum + '&sortBy=' + 'sortByValue';
//                axios.get(url, {
//                    params: {
//                        page: pageNum,
//                        sortBy: 'sortByvalue'
//                    }
//                }).then(function (response) {
//                        this.products = response.data.productsPage.data;
//                    }.bind(this)
//                )
            },
            fetchData(to, from) {
                axios.get(window.location.hash.substr(2)).then(function (response) {
                        this.category = response.data.category;
                        this.subcategories = response.data.category.children;
                        this.products = response.data.productsPage.data;
                        this.productsPage = response.data.productsPage;
                        this.$refs.paginate.selected = this.productsPage.current_page - 1;
                        Vue.nextTick(function () {
                            $('select').material_select();
                        });
                    }.bind(this)
                )
            },
            subcategoryExists() {
                return category.children.size > 0;
            }

        }
    }
</script>
