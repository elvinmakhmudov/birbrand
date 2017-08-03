<template>
    <div class="row">
        <div class="col-md-12">
            <h2 v-text="category.title"></h2>
        </div>
        <div v-for="subcategory in category.descendants">
            <category-card :title="subcategory.title" :slug="subcategory.slug"></category-card>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: '',
            subcategories: {},
            category: {}
        },
        created() {
            console.log('Container created.');
        }
    }
</script>
