import Vuex from 'vuex';
import axios from 'axios';
import Vue from 'vue';
import Messages from './classes/Messages';
import Errors from './classes/Errors';

Vue.use(Vuex);
export default new Vuex.Store({
    state: {
        categories: [],
        carousels: [],
        user: {},
        carousel_shown: true,
        messages: new Messages(),
        errors: new Errors(),
        banners: [],
        cartItems: [],
        topBannerHeight: 0
    },
    mutations: {
        setBanners(state, banners) {
            return state.banners = banners;
        },
        setCategories(state, categories) {
            for(var i=0;i<categories.length;i++) {
                if(categories[i].parent_id == undefined) {
                    state.categories.push(categories[i]);
                }
            }
        },
        setCarousels(state, carousels) {
            state.carousels = carousels;
        },
        setUser(state,user) {
            state.user = user;
        },
        setCart(state,cart) {
            state.cartItems= cart;
        },
    },
    actions: {
        getHomeData(context) {
            return new Promise((resolve, reject) => {
                axios.get('/category').then(function (response) {
                    context.commit('setCategories', response.data.categories);
                    context.commit('setCarousels', response.data.carousels);
                    context.commit('setBanners', response.data.banners);
                    context.commit('setCart', response.data.cart);
                    resolve(response);
                }).catch(function (response) {
                    reject(response);
                });
            })
        },
        getUser(context) {
            return new Promise((resolve, reject) => {
                axios.post('/currentUser').then(function (response) {
                    context.commit('setUser', response.data);
                    resolve(response);
                }).catch(function (response) {
                    reject(response);
                });
            })
        }
    },
});
