<template>
    <div class="row">
        <div class="col-md-12">
            <h2>{{ title }}</h2>
        </div>
        <category-card></category-card>
        <category-card></category-card>
        <category-card></category-card>
        <category-card></category-card>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: ''
            };
        },
        created() {
            console.log('Container created.');
            this.title = "Category title";
        }
    }
</script>
