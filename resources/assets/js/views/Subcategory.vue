<template>
    <div class="content">
        <div class="categories">
            <div class="row">
                <div class="col-md-12">
                    <h2> Subcategory title</h2>
                </div>
                <product-card></product-card>
                <product-card></product-card>
                <product-card></product-card>
                <product-card></product-card>
                <product-card></product-card>
                <product-card></product-card>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            console.log('home vue created');
        }
    }
</script>
