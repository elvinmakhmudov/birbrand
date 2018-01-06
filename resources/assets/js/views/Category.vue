<template>
    <div class="layout">
        <div class="row">
            <div class="col s6 left-align">
                <p v-show="category.title" class="category-title">
                    {{ $t('categories.' + category.title + '.main') }}
                </p>
            </div>
            <div class="col s6 right-align sort-by-button">
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn-flat' href='#'
                   data-activates='dropdown1'>{{ $t('categories.main.sortBy.main')}}</a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a @click="sortBy('rating','desc')">{{ $t('categories.main.sortBy.rating') }}</a></li>
                    <li><a @click="sortBy('created_at','desc')">{{ $t('categories.main.sortBy.date') }}</a></li>
                    <li><a @click="sortBy('price','asc')">{{ $t('categories.main.sortBy.priceLow') }}</a></li>
                    <li><a @click="sortBy('price','desc')">{{ $t('categories.main.sortBy.priceHigh') }}</a></li>
                    <li><a @click="sortBy('ordered','desc')">{{ $t('categories.main.sortBy.bestseller') }}</a></li>
                    <li><a @click="sortBy('trending','desc')">{{ $t('categories.main.sortBy.trending') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div v-for="subcategory in category.children">
                <category-card :subcategory="subcategory">
                </category-card>
            </div>
        </div>
        <div v-if="category.children" class="divider"></div>
        <div class="row products">
            <div v-for="product in products">
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
    import event from "../classes/Event";
    import Vue from "vue";

    export default {
        data() {
            return {
                category: {},
                products: [],
                subcategories: [],
                productsPage: {},
            };
        },
        watch: {
            // call again the method if the route changes
            $route(to, from) {
                if ($(window).scrollTop() >= 100) {
                    $("html").animate(
                        {
                            scrollTop: 100 // Scroll to top of body
                        },
                        500
                    );
                }
                //if from route and to route path before local query differ, change the page num to 0
                if (from.matched[0].path == to.matched[0].path) {
                    if (from.path != to.path) {
                        this.$refs.paginate.selected = 0;
                        this.$store.state.sortByColumn = 'created_at';
                        this.$store.state.orderBy = 'desc';
                    }
                }
                $(".dropdown-button").dropdown();
            }
        },
        created() {
            this.fetchData();
        },
        mounted() {
            this.$store.state.activeCategorySlug = this.$route.params.slug;
            var selector = ".nav-categories li";
            $(selector).removeClass("active");
            $($(selector).find(`[data-slug='${this.$store.state.activeCategorySlug}']`))
                .parent("li")
                .addClass("active");
            $(".dropdown-button").dropdown();
        },
        methods: {
            sortByButtonText() {
                switch(this.$store.state.sortByColumn) {
                    case 'rating':
                        return 'rating';
                    case 'created_at':
                        return 'date';
                    case 'price':
                        return  this.$store.state.orderBy === 'desc' ? 'priceHigh':'priceLow';
                    case 'ordered':
                        return 'bestseller';
                    case 'trending':
                        return 'trending';
                };

            },
            sortBy(column, order) {
                var path = window.location.href.split("?")[0];
                let sortBy = this.$store.state.sortByColumn = (column === undefined) ? this.$store.state.sortByColumn : column;
                let orderBy = this.$store.state.orderBy = (order === undefined) ? this.$store.state.orderBy : order;
                if (typeof path === undefined) {
                    var url = window.location.href;
                } else {
                    var url = window.location.href.split("?")[0];
                }

                window.location.href =
                    url + "?page=" + 1 + "&sortBy=" + sortBy + "&inOrder=" + orderBy;
            },
            goToPage(pageNum) {
                //                var url = this.productsPage.path + "?page=" + pageNum;
                //                var url = this.productsPage.path;
                this.$refs.paginate.selected = this.productsPage.current_page - 1;
                console.log(this.$store.state.sortByColumn);
                console.log(this.$store.state.orderBy);

                window.location.href =
                    window.location.href.split("?")[0] +
                    "?page=" +
                    pageNum +
                    "&sortBy=" + this.$store.state.sortByColumn +
                    "&inOrder=" +
                    this.$store.state.orderBy;
            },
            fetchData(to, from) {
                axios.get(window.location.hash.substr(2)).then(
                    function (response) {
                        this.category = response.data.category;
                        this.subcategories = response.data.category.children;
                        this.products = response.data.productsPage.data;
                        this.productsPage = response.data.productsPage;
                        this.$refs.paginate.selected = this.productsPage.current_page - 1;
                        Vue.nextTick(function () {
                            $("select").material_select();
                        });
                    }.bind(this)
                );
            },
            subcategoryExists() {
                return category.children.size > 0;
            }
        }
    };
</script>
