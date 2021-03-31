import Vue from 'vue';

/* VueX */
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        categories: [],
    },
    mutations: {
        setCategories (state, categories) {
            state.categories = categories;
        },
    },
    actions: {
        categories({commit}) {
            return axios.get('/api/categories')
            .then(resp => {
                commit('setCategories', resp.data.categories)
            });
        }
    },
    getters: {
        getCategories: state => state.categories,
    },
});

export default store;
