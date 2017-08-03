<template>
    <div class="content">
        <div class="slideshow">
        </div>
        <div class="layout">
            <div class="category" v-for="category in categories">
                <container :category="category"></container>
            </div>
        </div>
    </div>
</template>

<script>
    import event from '../classes/Event';
    export default {
        data() {
            return {
                categories: []
            }
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchData'
        },
        created() {
            this.fetchData()
        },
        methods: {
            fetchData: function () {
                this.categories = this.$root.$data.categories;
                event.$on('gotCategories', function (categories) {
                    this.categories = categories;
                }.bind(this))
            }
        }
    }
</script>
