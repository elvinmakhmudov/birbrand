<template>
    <div class="content">
        <div class="layout">
            <h5>{{ $t('about.text') }}</h5>
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
            },
            mountCarousel: function () {
                $('.slider').slick({
                    arrows: false
                });
            }
        }
    }
</script>
