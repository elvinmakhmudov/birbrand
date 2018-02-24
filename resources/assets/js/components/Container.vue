<template>
    <div class="row">
        <div class="col s12">
            <h6 v-text="$t('categories.'+category.title + '.main')"></h6>
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
        }
    }
</script>
