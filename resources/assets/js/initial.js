/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./material.min');
require('./ripples.min');
require('./smoothproducts.min');

// window.Vue = require('vue');
// VueRouter = require('vue-router');
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import router from './routes';

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
    data: {
        categories: []
    },
    created: function () {
        axios.get('/category').then(function (response) {
            this.categories = response.data;
            event.$emit('gotCategories', this.categories);
            Vue.nextTick(function () {
                $.material.init();
            })
        }.bind(this))
        console.log('home vue created');
    }
});

