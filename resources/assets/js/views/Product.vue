<template>
    <div class="container">
        <div class="content">
            <div class="layout">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <ol class="breadcrumb">
                                    <li v-for="ancestor in ancestors"><a
                                            :href="'#/category/' + ancestor.slug">{{ ancestor.title }}</a></li>
                                    <li><a href="#">{{ product.title }}</a></li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ product.title }}</h2>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="product-img">
                                    <img class="xzoom" :src="'/storage/'+product.thumbnail"
                                         :xoriginal="'/storage/'+product.thumbnail"/>
                                    <div class="xzoom-thumbs">
                                        <a v-for="image in product.images " :href="'/storage/'+image">
                                            <img class="xzoom-gallery" :src="'/storage/'+image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <h2>{{ product.price }} AZN </h2>
                                <form @submit.prevent="buyIt()">
                                    <div v-show="product.options" class="form-group product-option"
                                         v-for="(options, key) in JSON.parse(product.options || '[]')">
                                        <label v-bind:for="key"
                                               class="product-option-name control-label col-sm-2 col-md-2 col-lg-2">{{ key
                                            }}</label>
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <select class="form-control product-option-value" v-bind:id="key">
                                                <option v-for="option in options">{{ option }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="i5ps" class="control-label col-sm-2">Ədəd</label>
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label text-danger" v-if="errors.has('amount')"
                                                   v-text="errors.get('amount')"></label>
                                            <input type="number" @keydown="errors.purge()" class="form-control"
                                                   id="i5ps" value="1" min="1" max="100" v-model="amount">
                                        </div>
                                        <button class="btn btn-raised btn-primary" data-toggle="modal"
                                        >İndi al
                                        </button>
                                        <button @click.prevent="addToCart()" class="btn btn-primary" data-toggle="modal"
                                                data-target="#complete-dialog">Səbətə at
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <shippingInfo></shippingInfo>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <h4>Xususiyyetler</h4>
                                <div class="product-description">
                                    {{ product.description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <buyitguest :products="products" :fromCart="false"></buyitguest>
    </div>
    </div>

</template>

<script>
    import Errors from '../classes/Errors';
    import Vue from 'vue';

    import BuyItGuest from '../components/product/buyItGuest.vue';
    import ShippingInfo from '../components/product/shippingInfo.vue';

    export default {
        components: {
            'buyitguest': BuyItGuest,
            'shippingInfo': ShippingInfo
        },
        props: {
            product_id: ''
        },
        data() {
            return {
                errors: new Errors(),
                amount: 1,
                product: {
                    images: '',
                    category: {
                        title: ''
                    }
                },
                ancestors: [],
                products: []
            }
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchData'
        },
        created() {
            this.fetchData();
            console.log('product vue created')
        },
        methods: {
            getSelectedProductOptions() {
                var options = {};
                $('.product-option').each(function () {
                    var key = $(this).find(".product-option-name").text();
                    console.log(key);
                    var value = $(this).find(".product-option-value").val();
                    console.log(value);
                    options[key] = value;
                });
                console.log(options);
                return JSON.stringify(options);
            },
            addToCart() {
                axios.post('cart', {
                    productId: this.product.id,
                    options: this.getSelectedProductOptions(),
                    amount: this.amount
                }).then(function (response) {
                    this.$store.state.errors.record(response.data.errors);
                    this.$store.state.messages.record(response.data.messages);
                    this.$store.commit('setCartTotal', response.data.cart.cartTotal);
                    var items = Object.keys(response.data.cart.cartItems).map(function (k) {
                        return response.data.cart.cartItems[k]
                    });
                    this.$store.commit('setCartItems', items);
                    $('#flash-message').modal('toggle');
                }.bind(this)).catch(error => {
                    this.errors.record(error.response.data.errors);
                });

            },
            buyIt() {
                this.products = [{
                    productId: this.product.id,
                    options: this.getSelectedProductOptions(),
                    amount: this.amount
                }];
                var isLoggedIn = $("meta[name=login-status]").attr('content');
                if (isLoggedIn) {
                    axios.post('order', {
                        products: this.products,
                        fromCart: false
                    }).then(function (response) {
                        this.$store.state.errors.record(response.data.errors);
                        this.$store.state.messages.record(response.data.messages);
                        $('#flash-message').modal('toggle');
                    }.bind(this)).catch(error => {
                        this.errors.record(error.response.data);
                    });
                } else {
                    $('#buy-it-guest').modal('toggle');
                }
            },
            getAncestors() {
                console.log(this.product.category);
                var ancestors = this.getValuesByKey(this.product.category, 'title');
                return ancestors.reverse();
            },
            fetchData() {
                console.log(this.product_id);
                var productUrl = 'product/' + this.product_id;
                axios.get(productUrl).then(function (response) {
                    this.product = response.data;
                    this.ancestors = this.getAncestors(this.product);
                    Vue.nextTick(function () {
                        $(".xzoom, .xzoom-gallery").xzoom({
                            scroll: false
                        });
                    });
                }.bind(this));
                console.log('Product fetched');
            },
            getAncestors(product) {
                var ancestors = [];
                var categoryAncestors = this.getValuesByKey(product.category, 'ancestors');
                if (Array.isArray(categoryAncestors) && categoryAncestors.length !== 0) {
                    for (var i = 0; i < categoryAncestors.length; i++) {
                        ancestors = ancestors.concat(categoryAncestors[i]);
                    }
                }
                ancestors.push(product.category);
                return ancestors;
            },
            getValuesByKey(object, key) {
                var values = [];
                JSON.stringify(object, function (k, v) {
                    if (k === key && v.length > 0) {
                        console.log(v);
                        values.push(v)
                    }
                    ;
                    return v;
                });
                return values[0];
            },
        }
    }
</script>
