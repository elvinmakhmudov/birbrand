/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./material.min');
require('./ripples.min');
require('./smoothproducts.min');
require('./slick.min');

// window.Vue = require('vue');
// VueRouter = require('vue-router');
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import router from './routes';
import store from './store';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('product-card', require('./components/Product-card.vue'));
Vue.component('category-card', require('./components/Category-card.vue'));
Vue.component('container', require('./components/Container.vue'));
import event from './classes/Event';


const app = new Vue({
    el: '#app',
    router,
    store,
    computed: {
        categories() {
            return this.$store.state.categories
        }
    },
    created: function () {
        this.$store.dispatch('getHomeData').then(response => {
            Vue.nextTick(function () {
                $.material.init();
                $('.slider').slick({
                    arrows: false
                });
                this.$store.state.carousel_shown =false;
            }.bind(this))
        });
    }
});

