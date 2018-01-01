<template>
    <div class="col s6 m6 l2">
        <div class="card-container hoverable">
            <div class="card product-card">
                <a :href="'#/category/' + subcategory.slug">
                    <div class="card-image">
                        <div class="card-content">
                            <p>
                                {{ $t('categories.' + subcategory.title +'.main')}}
                            </p>
                        </div>
                        <img :src="'storage/'+subcategory.image_url" class="card-img-top">
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
