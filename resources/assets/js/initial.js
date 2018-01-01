/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
// require('./material.min');
// require('./ripples.min');
require('./materialize.min');
// require('./slick.min');
require('./xzoom');
require('./jquery.rateyo.min');
// window.Vue = require('vue');
// VueRouter = require('vue-router');
import Vue from 'vue';
import VueRouter from 'vue-router';
var VueCookie = require('vue-cookie');
import Paginate from 'vuejs-paginate';
import VueI18n from 'vue-i18n';
Vue.use(VueRouter);
Vue.use(VueCookie);
Vue.use(VueI18n);
import router from './routes';
import store from './store';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('product-card', require('./components/Product-card.vue'));
Vue.component('category-card', require('./components/Category-card.vue'));
Vue.component('navcategories', require('./components/nav/categories.vue'));
Vue.component('container', require('./components/Container.vue'));
Vue.component('flashmessage', require('./components/flash-message.vue'));
Vue.component('paginate', Paginate);
//register banners
Vue.component('top-banner', require('./components/banners/top-banner.vue'));
Vue.component('left-banner', require('./components/banners/left-banner.vue'));
Vue.component('right-banner', require('./components/banners/right-banner.vue'));
import messages from './lang/messages';
// Create VueI18n instance with options
const i18n = new VueI18n({
    locale: 'az', // set locale
    messages, // set locale messages
});
const app = new Vue({
    i18n,
    el: '#app',
    router,
    store,
    data: {
        myCategories: {}
    },
    computed: {
        categories() {
            return this.$store.state.categories
        },
    },
    methods: {
        setLocale(lang) {
            this.$cookie.set('lang', lang, 7);
            i18n.locale = lang;
        }

    },
    created: function() {
        i18n.locale = this.$cookie.get('lang') || 'az';
        this.$store.dispatch('getHomeData').then(response => {
            Vue.nextTick(function() { 
              $('select').material_select();
              $(".modal").modal();
                // $.material.init();
                // $('.slider').slick({
                //     arrows: false
                // });
                var selector = '.nav-categories li';
                $(selector).click(function(item) {
                    $(selector).removeClass('active');
                    $(this).addClass('active');
                });
                this.$store.state.carousel_shown = false;
                //fix the banners on scroll and resize
                var elementPosition = $('.left-banner').offset();
                console.log('banner postion ' + this.$store.state.topBannerHeight);
                // var categoriesPosition = $('.categories-header').offset();
                var p = $('.main-container').offset();
                $(window).resize(function() {
                    if ($(this).scrollTop() > (this.$store.state.topBannerHeight)) {
                        $('.left-banner').css({
                            left: p.left - 200
                        });
                        $('.right-banner').css({
                            left: p.left + 1100
                        });
                    }
                }.bind(this));
                $(window).scroll(function() {
                    if ($(this).scrollTop() > (this.$store.state.topBannerHeight)) {
                        var p = $('.main-container').offset();
                        $('.left-banner').addClass('fixed').css({
                            left: p.left - 200
                        });
                        $('.right-banner').addClass('fixed').css({
                            left: p.left + 1100
                        });
                    } else {
                        $('.left-banner').removeClass('fixed').css({
                            left: '-200px'
                        });
                        $('.right-banner').removeClass('fixed').css({
                            left: '1100px'
                        });
                    }
                }.bind(this));
            }.bind(this))
        });
        this.$store.dispatch('getUser');
    },
});