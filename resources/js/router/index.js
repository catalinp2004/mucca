import Vue from 'vue';

/* Vue Router */
import VueRouter from 'vue-router';
import store from '../store/index.js'
Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/catalog',
            component: () => import(/* webpackChunkName: "person" */ '../views/Catalog/Products'),
            beforeEnter: (to, from, next) => {
                console.log('da');
                if (to.query.category != undefined){
                   store.commit('setSelected', decodeURIComponent(to.query.category));
                }
                next();
            }
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
