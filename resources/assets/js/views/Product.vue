<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Library</a></li>
                                <li><a href="#">{{ product.category.title }}</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{ product.title }}</h2>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-img">
                                <img :src="product.image_url" alt="Card image cap">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                                <h2>{{ product.price }} AZN </h2><br>
                            <div class="product-options">
                                <span>Sechimler </span><br>
                                <a href="javascript:void(0)" class="btn btn-raised btn-primary">İndi al</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="item-shipping-payment">
                                <div class="item-shipping-payment-box">
                                    <p class="text-title">Çatdırılma</p>
                                    <div class="text">
                                        <p>Sifarişi etdikdən sonra operatorumuz sizinlə əlaqə saxlayacaq.</p>
                                        <p>Növbəti gün məhsul sizə pulsuz çatdırılacaq.</p>
                                    </div>
                                </div>
                                <div class="item-shipping-payment-box">
                                    <p class="text-title">Ödəniş</p>
                                    <div class="text">
                                        <p>Ödəniş məhsulu əldə etdikdən sonra yerindəcə nağd yaxud taksit kartla FAİZSİZ (Albalı+, BolKart, WordCard, SmileCard, BirKart) həyata keçirilir.</p>
                                    </div>
                                </div>
                                <div class="item-shipping-payment-box">
                                    <p class="text-title ">Müştəri məmnuniyyəti</p>
                                    <div class="text">
                                        <p>Qaytarış yerində hər bir məhsula görə
                                            <br><b>2 AZN</b></p>
                                        <p>Məhsul təsvirə yaxud şəkillərə uyğun gəlmədikdə<b> ödənişsiz</b>qaytarla bilər.</p>
                                        <p>Saat 18:00-dək EXPRESS (2 saat ərzində) çatdırılma 5 AZN.
                                        </p>
                                    </div>
                                </div>
                            </div>
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
    </div>
</template>

<script>
    export default {
        props: {
            product_id: ''
        },
        data() {
            return {
                product: {}
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
            fetchData() {
//                var productUrl = window.location.hash.substr(2);
                console.log(this.product_id);
                var productUrl = 'product/' + this.product_id;
                axios.get(productUrl).then(response => this.product = response.data)
                console.log('Product fetched');
            }
        }
    }
</script>
