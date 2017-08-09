<template>
    <div class="content">
        <div class="slideshow slider">
            <div><img
                    src="https://aldim.az/uploads/banner/218/photo/light_resize/1444x800_crop_118af64bd984ce1ec1816025e4622dde.png"
                    alt=""></div>
            <div><img
                    src="https://aldim.az/uploads/banner/218/photo/light_resize/1444x800_crop_118af64bd984ce1ec1816025e4622dde.png"
                    alt=""></div>
            <div><img
                    src="https://aldim.az/uploads/banner/218/photo/light_resize/1444x800_crop_118af64bd984ce1ec1816025e4622dde.png"
                    alt=""></div>
            <div><img
                    src="https://aldim.az/uploads/banner/218/photo/light_resize/1444x800_crop_118af64bd984ce1ec1816025e4622dde.png"
                    alt=""></div>
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
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData: function () {
                this.categories = this.$root.$data.categories;
                event.$on('gotCategories', function (categories) {
                    this.categories = categories;
                }.bind(this));
                $('.slider').slick({
                    arrows: false
                });
                console.log('slider');
            }
        }
    }
</script>
