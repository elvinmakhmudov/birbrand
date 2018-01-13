<template>
    <div class="col s4 m4 l3 products">
        <div class="card-container hoverable">
            <div class="card product-card">
                <a :href="'#/product/'+product.id">
                    <div class="card-image">
                        <div class="card-content hide-on-med-and-down">
                            <p>
                                {{product.title}}
                            </p>
                        </div>
                    </div>
                    <div>
                        <progressive-img :src="'storage/'+product.folder+'/thumbnail.jpg'" :placeholder="'storage/'+product.folder+'/placeholder.jpg'" />
                    </div>
                    <div class="product-price-container">
                        <div class="product-price">
                            {{ product.price }} ₼
                        </div>
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
      id: "",
      title: "",
      price: "",
      thumbnail: ""
    };
  },
  props: {
    product: {}
  },
  created() {}
};
</script>
