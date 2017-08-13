<template>
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
                        <div class="col-md-4 col-xs-6">
                            <div class="sp-wrap product-img">
                                <div v-for="image in product.images">
                                    <a :href="image"><img :src="image" alt="Card image cap"></a>
                                </div>
                            </div>
                            <!--<div class="product-img">-->
                            <!--<img :src="product.image_url" alt="Card image cap">-->
                            <!--</div>-->
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <h2>{{ product.price }} AZN </h2><br>
                            <div class="product-options">
                                <span>Sechimler </span><br>
                                <form @submit.prevent="buyIt()">
                                    <div class="form-group">
                                        <label for="i5ps" class="control-label col-sm-2">Ədəd</label>
                                        <div class="col-sm-10">
                                            <label class="control-label text-danger" v-if="errors.has('amount')"  v-text="errors.get('amount')"></label>
                                            <input type="number" class="form-control" id="i5ps" value="1" min="1" max="100" v-model="amount">
                                        </div>
                                        <button class="btn btn-raised btn-primary" data-toggle="modal"
                                           >İndi al</button>
                                        <button type="submit" class="btn btn-primary" data-toggle="modal"
                                                data-target="#complete-dialog">Səbətə at
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <shippingInfo></shippingInfo>
                        </div>
                        <div class="col-md-12">
                            <h4>Xususiyyetler</h4>
                            <div class="product-description">
                                {{ product.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <buyit></buyit>
        <buyitguest></buyitguest>
        <flashmessage :messages="messages" :errors="errors"></flashmessage>
    </div>

</template>

<script>
    import Errors from '../classes/Errors';
    import Vue from 'vue';
    import FlashMessage from '../components/product/flash-message.vue';
    import BuyIt from '../components/product/buyIt.vue';
    import BuyItGuest from '../components/product/buyItGuest.vue';
    import ShippingInfo from '../components/product/shippingInfo.vue';

    export default {
        components: {
            'buyit': BuyIt,
            'flashmessage': FlashMessage,
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
                messages: {}
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
            buyIt() {
                var isLoggedIn = $("meta[name=login-status]").attr('content');
                if (isLoggedIn) {
                    axios.post('order', {
                        productId: this.product.id,
                        amount: this.amount
                    }).then(function (response) {
                        this.messages = response.data;
                        $('#flash-message').modal('toggle');
                    }.bind(this)).catch(error => {
                        this.errors.record(error.response.data);
//                        $('#flash-message').modal('toggle');
                    });
                } else {

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
                        $('.sp-wrap').smoothproducts();
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
