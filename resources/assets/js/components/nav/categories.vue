<template>
    <ul class="nav-categories">
        <li class="category-tab" v-for="category in navCategories">
            <a :href="'#/category/'+category.slug" :data-slug="category.slug" class="waves-effect waves-light">
                {{ $t('categories.' + category.title +'.main')}}
            </a>
        </li>
    </ul>
</template>
<script>
    export default {
        props: {
        	navCategories: {}
        },
		mounted() {
            this.$store.state.categories = this.navCategories;
            console.log('myCategories created.');
        }
    }
</script>
