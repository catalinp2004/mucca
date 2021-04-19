<template>
    <div class="catalog-page-wrapper pad-top flex-fill d-flex flex-column flex-lg-row" :class="isProductsPage ? '' : ''">
        <nav class="nav-catalog pad-left-catalog pad-right-catalog mb-4 mb-md-5 mb-lg-0">

            <div class="navbrand-toggler-wrapper d-flex justify-content-between">
                <a :href="(lang == 'en' ? '/en' :'') + '/'" class="navbar-brand mb-lg-5 py-0">
                    <img src="/img/logo_mucca_catalog.png" srcset="/img/logo_mucca_catalog.svg 1x" alt="logo-mucca">
                </a>

                <b-navbar-toggle  class="navbar-toggler-catalog px-0" target="catalog-menu-collapse">
                    <template #default="{  }">
                        <img src="/img/toggler_bar_catalog.png" srcset="/img/toggler_bar_catalog.svg 1x" alt="toggler-bar" class="toggler-bar top-bar img-fluid d-block mb-2">
                        <img src="/img/toggler_bar_catalog.png" srcset="/img/toggler_bar_catalog.svg 1x" alt="toggler-bar" class="toggler-bar middle-bar img-fluid d-block mb-2">
                        <img src="/img/toggler_bar_catalog.png" srcset="/img/toggler_bar_catalog.svg 1x" alt="toggler-bar" class="toggler-bar bottom-bar img-fluid d-block">
                    </template>
                </b-navbar-toggle>
            </div>

            <b-collapse id="catalog-menu-collapse" >
                <div class="d-flex flex-column flex-sm-row flex-lg-column justify-content-between justify-content-sm-start justify-content-lg-between align-items-start pt-5 pt-lg-0">
                    <ul class="navbar-nav nav-category mb-5 ml-sm-5 ml-lg-0 order-sm-2 order-lg-1">
                        <li class="nav-item" @click="close_nav">
                            <router-link :to="(lang == 'en' ? '/en' :'') +'/catalog'" @click="selected_category = null" v-bind:class="{'nav-link':true, 'nav-link-toplist':(selected_category == null)}">All</router-link>
                        </li>
                        <li class="nav-item" v-for="cat in categories" :key="cat.id" @click="close_nav">
                            <router-link :to="{path:(lang == 'en' ? '/en' :'') +'/catalog', query:{category: encodeURIComponent(cat.name_ro)}}" @click="selected_category = cat.name_ro" v-bind:class="{'nav-link':true, 'nav-link-toplist':(selected_category == cat.name_ro)}">{{lang == 'ro' ? cat.name_ro : cat.name_en }}</router-link>
                        </li>
                    </ul>

                    <div class="ml-sm-5 ml-lg-0 order-sm-1 order-lg-2 mb-5">
                        <ul class="navbar-nav nav-all-pages">
                            <li class="nav-item">
                                <a :href="(lang == 'en' ? '/en' :'') + '/'" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a :href="(lang == 'en' ? '/en' :'') + '/povestea'" class="nav-link">{{ (lang == 'ro' ? 'Povestea noastra' : 'Our Story') }}</a>
                            </li>
                            <li class="nav-item">
                                <a :href="(lang == 'en' ? '/en' :'') + '/povestea#servicii'" class="nav-link">{{ (lang == 'ro' ? 'Servicii' : 'Services') }}</a>
                            </li>
                            <li class="nav-item">
                                <a :href="(lang == 'en' ? '/en' :'') + '/catalog'" class="nav-link">Catalog</a>
                            </li>
                            <li class="nav-item">
                                <a :href="(lang == 'en' ? '/en' :'') + '/clienti'" class="nav-link">{{ (lang == 'ro' ? 'Clienți' : 'Clients') }}</a>
                            </li>
                            <li class="nav-item">
                                <a :href="(lang == 'en' ? '/en' :'') + '/contact'" class="nav-link">Contact</a>
                            </li>
                        </ul>
                    </div>

                </div>
                    <div>
                        <span @click="lang='ro'" v-bind:class="{'active': lang =='ro'}">RO</span>
                        |
                        <span @click="lang='en'" v-bind:class="{'active': lang =='en'}">EN</span>
                    </div>

            </b-collapse>


        </nav>
        <transition name="page-change" mode="out-in">
            <router-view class="router-view flex-fill d-flex flex-column"></router-view>
        </transition>
    </div>
</template>


<script>
export default {
    name: "App",
    data(){
        return{
            categories: this.$store.state.categories,
            errors:null
        }
    },
    computed: {
        lang:{
            get() {
                if(this.$route.path.split('/')[1] == 'en') {
                    return 'en';
                }
                else return 'ro';
            },
            set(newValue) {
                if (newValue == 'en' && this.$route.path.split('/')[1] != 'en'){
                    this.$router.push('/en' + this.$route.path) ;
                } else {
                    this.$router.push(this.$route.path.split('en')[1]) ;
                }

            }


        },
        selected_category:{
            get() {
                return this.$store.getters.getSelected;
            },
            set(newValue) {
                this.$store.commit('setSelected', newValue)
            }
        },
        isProductsPage: function() {
            return this.$route.name === 'products'
        }
    },
    created(){
        this.$store.dispatch('categories').then( () => {
                this.categories = this.$store.getters.getCategories
            }
        );
        this.$store.dispatch('products_count');
        this.$store.dispatch('colors');
    },
    methods: {
        close_nav: function() {
            this.$root.$emit('bv::toggle::collapse', 'catalog-menu-collapse')
        }
    },
}
</script>
<style>
span.active {
    color: #65D07D;
}
</style>
