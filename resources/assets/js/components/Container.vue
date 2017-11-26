<template>
    <div class="row">
        <div class="col s12">
            <h5 v-text="$t('categories.'+category.title + '.main')"></h5>
        </div>
        <div v-for="subcategory in category.children">
            <category-card :subcategory="subcategory"></category-card>
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
        },
    }
</script>
