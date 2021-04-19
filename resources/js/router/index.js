import Vue from 'vue';

/* Vue Router */
import VueRouter from 'vue-router';
import store from '../store/index.js'
import Products from '../views/Catalog/Products'
import Product from '../views/Catalog/Product'
import NotFound from '../views/NotFound'

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/catalog',
            alias:['/en/catalog', '/ro/catalog'],
            name: 'products',
            component: Products,
            beforeEnter: (to, from, next) => {
                if (to.query.category != undefined){
                   store.commit('setSelected', decodeURIComponent(to.query.category));
                }
                next();
            }
        },
        {
            alias:['/en/catalog/404', '/ro/catalog/404'],
            path: '/catalog/404',
            component: NotFound
        },
        {
            alias:['/en/catalog/:slug', '/ro/catalog/:slug'],
            path: '/catalog/:slug',
            name: 'product',
            component: Product,
        },
    ],
    mode: 'history',
});

export default router;
