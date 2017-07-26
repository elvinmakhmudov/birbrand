<template>
    <div class="col-md-3 col-xs-6">
        <div class="card-container">
            <div class="card">
                <a href="#/subcategory">
                    <img class="card-img-top"
                         src="https://aldim.az/uploads/item_gallery_photo/14471/image/light_resize/230x230_2.png">
                    <div class="card-block">
                        <h4 class="card-title">{{ description }}</h4>
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
                description: ''
            }
        },
        created() {
            console.log('Category card created.');
            this.description = "Subcategory title";
        }
    }
</script>
