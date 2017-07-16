<template>
    <div class="row">
        <div class="col-md-12">
            <h2>{{ title }}</h2>
        </div>
        <product-card></product-card>
        <product-card></product-card>
        <product-card></product-card>
        <product-card></product-card>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: this.title
            };
        },
        created() {
            console.log('Container created.');
            this.title = "moe";
        }
    }
</script>
