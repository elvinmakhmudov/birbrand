<template>
    <div class="col s4 m2 l2 products">
        <div class="card-container hoverable">
            <div class="card category-card">
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
        }
    }
</script>
