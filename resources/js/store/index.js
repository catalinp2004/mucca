import Vue from 'vue';

/* VueX */
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        categories: [],
        colors: [],
        count_products: 0,
        selected_category: null,
    },
    mutations: {
        setCategories (state, categories) {
            state.categories = categories;
        },
        setColors (state, colors) {
            state.colors = colors;
        },
        setCount (state, count) {
            state.count_products = count;
        },
        setSelected (state, selected) {
            state.selected_category = selected;
        },
    },
    actions: {
        categories({commit}) {
            return axios.get('/api/categories')
            .then(resp => {
                commit('setCategories', resp.data.categories)
            });
        },
        colors({commit}) {
            return axios.get('/api/colors')
            .then(resp => {
                commit('setColors', resp.data.colors)
            });
        },
        products_count({commit}) {
            return axios.get('/api/products/count')
            .then(resp => {
                commit('setCount', resp.data.count)
            });
        },
    },
    getters: {
        getCategories: state => state.categories,
        getCount: state => state.count_products,
        getSelected: state => state.selected_category,
        getColors: state => state.colors,
    },
});

export default store;
