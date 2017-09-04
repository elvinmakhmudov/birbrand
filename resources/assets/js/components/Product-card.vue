<template>
    <div class="col-md-3 col-xs-4">
        <div class="card-container">
            <div class="card product-card">
                <a :href="'#/product/'+product.id">
                    <div class="product-price-container">
                        <div class="product-price">
                            {{ product.price }} AZN
                        </div>
                    </div>
                    <img class="card-img-top"
                         :src="'storage/'+product.thumbnail"
                         alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">{{ product.title }}</h4>
                        <!--<a href="#" class="btn btn-raised btn-primary center-block btn-buy">Almaq</a>-->
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: '',
                title: '',
                price: '',
                thumbnail: ''
            }
        },
        props: {
            product: {},
        },
        created() {
        },
    }
</script>
