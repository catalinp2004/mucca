import Vue from 'vue';

/* Vue Router */
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/catalog',
            component: () => import(/* webpackChunkName: "person" */ '../views/Catalog/Products'),
        },
        {
            path: '*',
            component: () => import(/* webpackChunkName: "person" */ '../views/NotFound')
        },
        {
            path: '/catalog/product',
            name: 'product',
            component:  () => import(/* webpackChunkName: "person" */ '../views/Catalog/Product'),
        }
    ],
    mode: 'history',
});

export default router;
