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
        cartTotal: 0,
        cartItems: {},
        topBannerHeight: 0,
        activeCategorySlug: {},
        sortByColumn: 'created_at',
        orderBy: 'desc'
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
        setCartTotal(state,cartTotal) {
            state.cartTotal= cartTotal;
        },
        setCartItems(state,cartItems) {
            state.cartItems= cartItems;
        },
        setLocale(state, locale) {
            state.locale = locale;
        }
    },
    actions: {
        getHomeData(context) {
            return new Promise((resolve, reject) => {
                axios.get('/category').then(function (response) {
                    // context.commit('setCategories', response.data.categories);
                    context.commit('setCarousels', response.data.carousels);
                    context.commit('setBanners', response.data.banners);
                    context.commit('setCartTotal', response.data.cart.cartTotal);
                    var items = Object.keys(response.data.cart.cartItems).map(function(k) { return response.data.cart.cartItems[k] });
                    context.commit('setCartItems', items);
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
