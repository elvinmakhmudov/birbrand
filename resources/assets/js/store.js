import Vuex from 'vuex';
import axios from 'axios';
import {mapActions} from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);
export default new Vuex.Store({
    state: {
        categories: [],
        carousels: [],
        carousel_shown: true
    },
    mutations: {
        setCategories(state, categories) {
            state.categories = categories;
        },
        setCarousels(state, carousels) {
            state.carousels = carousels;
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
        }
    },
});
