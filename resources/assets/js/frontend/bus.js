import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        count: 0,
    },
    mutations: {
        updateCounter(state, payload) {
            state.count = payload;
        },
    },
    actions: {
        refreshCart(context) {
            return new Promise((resolve) => {
                axios.get('/cart/count')
                    .then((response) => {
                        if (response.data.status) {
                            context.commit('updateCounter', response.data.result);
                            resolve();
                        } else {
                            context.commit('updateCounter', 0);
                            resolve();
                        }
                    })
                    .catch(function (error) {
                    });
            });
        },
    }
});