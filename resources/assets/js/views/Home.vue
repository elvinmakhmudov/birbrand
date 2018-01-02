<template>
        <div>
            <div class="slideshow slider" v-if="carousels.length">
                <div v-for="slide in carousels">
                    <img alt="" :src="'/storage/'+slide.image_url">
                </div>
            </div>


            <div class="layout">
                <div class="category" v-if="categories" v-for="category in categories">
                    <container :category="category"></container>
                </div>
            </div>
        </div>
</template>

<script>
    import event from '../classes/Event';

    export default {
        computed: {
            categories() {
                return this.$store.state.categories
            },
            carousels() {
                return this.$store.state.carousels
            }
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchData',
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData: function () {
                if (!this.$store.state.carousel_shown) {
                    this.mountCarousel();
                    this.$store.state.carousel_shown = false;
                }
            },
            mountCarousel: function () {
//                $('.slider').slick({
//                    arrows: false
//                });
            }
        }
    }
</script>
