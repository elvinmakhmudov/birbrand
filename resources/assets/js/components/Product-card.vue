<template>
    <div class="col-md-3 col-xs-6">
        <div class="card-container">
            <div class="card product-card">
                <div class="product-price-container">
                    <div class="product-price">
                        {{ price }} AZN
                    </div>
                </div>
                <img class="card-img-top"
                     src="https://aldim.az/uploads/item_gallery_photo/14471/image/light_resize/230x230_2.png"
                     alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">{{ title }}</h4>
                    <a href="#" class="btn btn-raised btn-primary center-block btn-buy">Almaq</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            price: '',
            title: ''
        },
        created() {
        }
    }
</script>
