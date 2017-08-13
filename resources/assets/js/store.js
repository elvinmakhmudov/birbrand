import Vuex from 'vuex';
import axios from 'axios';
import Vue from 'vue';

Vue.use(Vuex);
export default new Vuex.Store({
    state: {
        categories: [],
        carousels: [],
        user: {},
        carousel_shown: true
    },
    mutations: {
        setCategories(state, categories) {
            state.categories = categories;
        },
        setCarousels(state, carousels) {
            state.carousels = carousels;
        },
        setUser(state,user) {
            state.user = user;
        },
    },
    actions: {
        getHomeData(context) {
            return new Promise((resolve, reject) => {
                axios.get('/category').then(function (response) {
                    context.commit('setCategories', response.data.categories);
                    context.commit('setCarousels', response.data.carousels);
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
