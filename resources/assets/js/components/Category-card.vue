<template>
    <div class="col-md-3 col-xs-6">
        <div class="card-container">
            <div class="card category-card">
                <a :href="'#/category/' + subcategory.slug">
                    <img class="card-img-top"
                         :src="'storage/'+subcategory.image_url">
                    <div class="card-block">
                        <h4 class="card-title category-title"> {{ subcategory.title }}</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            subcategory: {
                title: '',
                slug: '',
                image_url: '',
            }
        },
        created() {
            console.log('Category card created.');
        }
    }
</script>
