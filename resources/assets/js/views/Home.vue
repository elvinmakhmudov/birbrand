<template>
    <div class="content">
        <div class="slideshow slider">
            <div v-for="slide in carousels">
                <img alt="" :src="slide.image">
            </div>
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
            console.log('mounted home');
        },
        methods: {
            fetchData: function () {
                if(!this.$store.state.carousel_shown) {
                    this.mountCarousel();
                    this.$store.state.carousel_shown =false;
                    console.log('in home vue carousel shown was false')
                }
//                event.$on('gotCarousel',function () {
//                    this.mountCarousel();
//                    console.log('slider');
//                }.bind(this));
            },
            mountCarousel: function () {
                $('.slider').slick({
                    arrows: false
                });
            }
        }
    }
</script>
