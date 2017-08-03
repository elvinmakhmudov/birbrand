<template>
    <div class="col-md-3 col-xs-6">
        <div class="card-container">
            <div class="card product-card">
                <a :href="'#/product/'+product.id">
                    <div class="product-price-container">
                        <div class="product-price">
                            {{ product.price }} AZN
                        </div>
                    </div>
                    <img class="card-img-top"
                         src="https://aldim.az/uploads/item_gallery_photo/14471/image/light_resize/230x230_2.png"
                         alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">{{ product.title }}</h4>
                        <a href="#" class="btn btn-raised btn-primary center-block btn-buy">Almaq</a>
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
                price: ''
            }
        },
        props: {
            product: {},
            slug: ''
        },
        created() {
        },
    }
</script>
