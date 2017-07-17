<template>
    <div class="col-md-3 col-xs-6">
        <div class="card-container">
            <div class="card">
                <div class="product-price-container">
                    <div class="product-price">
                        {{ price }} AZN
                    </div>
                </div>
                <img class="card-img-top"
                     src="https://aldim.az/uploads/item_gallery_photo/14471/image/light_resize/230x230_2.png"
                     alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">{{ description }}</h4>
                    <a href="#" class="btn btn-raised btn-primary center-block">Almaq</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                price: this.price,
                description: this.description
            }
        },
        created() {
            console.log('Product card created.')
            this.price = 10;
            this.description = "description";
        }
    }
</script>
