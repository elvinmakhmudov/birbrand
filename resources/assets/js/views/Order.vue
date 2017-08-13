<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mənim səhifəm</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                category: {},
                products: []
            }
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchData'
        },
    }
</script>
