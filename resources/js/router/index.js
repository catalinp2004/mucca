import Vue from 'vue';

/* Vue Router */
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/catalog',
            component: () => import(/* webpackChunkName: "person" */ '../views/Catalog/Products'),
                // {
                //     path: 'result-select/:test_code',
                //     name: 'result_select',
                //     component:  () => import(/* webpackChunkName: "person" */ '../views/person/PersonResultSelect'),
                //     beforeEnter: (to, from, next) => {
                //         if (!(from.name == 'scan' && to.params.test_code == '2f8cde0d-b23c-444a-bd26-3784228d79b8')){
                //             router.push('/404').catch(er => {if (er.name != "NavigationDuplicated") { throw er; } });
                //         }
                //         next();
                //     }
                // },
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
