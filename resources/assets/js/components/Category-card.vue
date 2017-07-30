<template>
    <div class="col-md-3 col-xs-6">
        <div class="card-container">
            <div class="card category-card">
                <a :href="'#/category/' + slug">
                    <img class="card-img-top"
                         src="https://aldim.az/uploads/item_gallery_photo/14471/image/light_resize/230x230_2.png">
                    <div class="card-block">
                        <h4 class="card-title category-title"> {{ title }}</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: '',
            slug: ''
        },
        created() {
            console.log('Category card created.');
        }
    }
</script>
