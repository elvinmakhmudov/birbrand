<template>
    <div class="col s6 m4 l3">
        <!--         <div class="card-container">
            <div class="card product-card">
                <a :href="'#/product/'+product.id">
                    <div class="product-price-container">
                        <div class="product-price">
                            {{ product.price }} AZN
                        </div>
                    </div>
                    <img :src="'storage/'+product.folder+'/thumbnail.jpg'" alt="Card image cap" class="card-img-top">
                        <div class="card-block">
                            <h4 class="card-title text-center">
                                {{ product.title }}
                            </h4>
                            <!--<a href="#" class="btn btn-raised btn-primary center-block btn-buy">Almaq</a>-->
        <!--                         </div>
                    </img>
                </a>
            </div>
        </div>
 -->
        <div class="card-container hoverable">
            <div class="card product-card">
                <a :href="'#/product/'+product.id">
                    <div class="card-image">
                        <div class="product-price-container">
                            <div class="product-price">
                                {{ product.price }} AZN
                            </div>
                        </div>
                        <div class="card-content">
                            <p>
                                {{product.title}}
                            </p>
                        </div>
                        <img :src="'storage/'+product.folder+'/thumbnail.jpg'" alt="Card image cap" class="card-img-top">
                        </img>
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
