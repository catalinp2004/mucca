<template>
    <div>
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
                                <router-link :to="(lang == 'en' ? '/en' :'') +'/catalog'" @click="selected_category = null" v-bind:class="{'nav-link':true, 'nav-link-toplist':(selected_category == null)}"><span v-if="lang=='ro'">Toate</span><span v-else>All</span></router-link>
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
                                    <a :href="(lang == 'en' ? '/en' :'') + '/povestea'" class="nav-link">{{ (lang == 'ro' ? 'Povestea noastră' : 'Our Story') }}</a>
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
                                <li class="nav-item lang-switcher mt-5">
                                    <a href="#" rel="alternate" hreflang="ro" v-if="lang=='en'" @click.prevent="lang = 'ro'">RO</a>
                                    <span v-else>RO</span>
                                    |
                                    <a href="#" rel="alternate" hreflang="en" v-if="lang=='ro'" @click.prevent="lang = 'en'">EN</a>
                                    <span v-else>EN</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </b-collapse>


            </nav>
            <transition name="page-change" mode="out-in">
                <router-view class="router-view flex-fill d-flex flex-column"></router-view>
            </transition>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 offset-lg-3 cta-catalog d-flex flex-column justify-content-center pl-5 pr-5 text-center text-lg-left">
                    <h5 v-if="lang=='ro'">Ai nevoie de o simulare ca să te<br class="d-none d-lg-block"> convingi ca ai ales bine? Scrie-ne</h5>
                    <h5 v-if="lang=='en'">Do you need a mockup to make sure<br class="d-none d-lg-block"> you’ve made the right choice? Contact us!</h5>
                    <a href="mailto:hello@mucca.ro">hello@mucca.ro</a>
                </div>
            </div>
            <div class="row">
                <footer class="col-12 info-pages-footer">
                    <div class="row">
                        <div class="col-lg-3 pad-left d-flex align-items-center align-items-md-end align-items-lg-start flex-column flex-md-row flex-lg-column footer-col my-5">
                            <img src="/img/icon_logo_mucca.png" srcset="/img/icon_logo_mucca.png 1x" alt="logo-mucca" class="img-fluid mb-lg-5 mr-4 mr-lg-0">
                            <div class="social-icons d-flex my-4 my-md-0 mb-lg-5 mr-4 mr-lg-0">
                                <a href="https://www.instagram.com/mucca_production_advertising/" target="_blank" rel="noopener">
                                    <img src="/img/icon_instagram.png" srcset="/img/icon_instagram.png 1x" alt="icon-instagram" class="img-fluid mr-2">
                                </a>
                                <a href="https://www.linkedin.com/company/mucca-production-&amp;-advertising" target="_blank" rel="noopener" >
                                    <img src="/img/icon_linkedin.png" srcset="/img/icon_linkedin.png 1x" alt="icon-linkedin" class="img-fluid">
                                </a>
                            </div>
                            <div class="d-flex flex-column flex-sm-row flex-lg-column">
                                <a v-if="lang == 'ro'" :href="(lang == 'en' ? '/en' :'') + '/info_page'" class="mb-3 mb-sm-0 mb-lg-2 mr-4 mr-lg-0 text-center text-sm-left">Date de identificare</a>
                                <a v-else :href="(lang == 'en' ? '/en' :'') + '/info'" class="mb-3 mb-sm-0 mb-lg-2 mr-4 mr-lg-0 text-center text-sm-left">Company ID</a>
                                <a v-if="lang == 'ro'" :href="(lang == 'en' ? '/en' :'') + '/info_page#confidentialitate'" class="mb-3 mb-sm-0 mb-lg-2 mr-4 mr-lg-0 text-center text-sm-left">Confidențialitate</a>
                                <a v-else :href="(lang == 'en' ? '/en' :'') + '/info#confidentialitate'" class="mb-3 mb-sm-0 mb-lg-2 mr-4 mr-lg-0 text-center text-sm-left">Privacy</a>
                                <a :href="(lang == 'en' ? '/en' :'') + '/info#cookies'" class="mb-lg-2 mr-4 mr-lg-0 text-center text-sm-left">Cookies</a>
                            </div>
                        </div>
                        <div class="col-lg-9 pt-5 pad-right bk-black white d-flex flex-column pad-left-mobile pl-lg-5">
                            <div class="row">
                                <div class="col-xl-8 mb-5 mb-xl-0">
                                    <h2 v-if="lang == 'ro'" id="footer-h2" class="mb-5 text-center text-md-left">Te gândești la un proiect pilot?</h2>
                                    <h2 v-else id="footer-h2" class="mb-5 text-center text-md-left">Do you have a pilot project in mind?</h2>
                                    <div class="footer-contacts d-flex justify-content-center justify-content-md-start">
                                        <img src="/img/footer_arrow.png" srcset="/img/footer_arrow.png 1x" alt="icon-arrow" class="img-fluid mr-3">
                                        <a href="tel:+40758094410" class="mr-3 white"><strong>+4&nbsp;0758&nbsp;904&nbsp;410</strong></a>
                                        <a href="mailto:hello@mucca.ro" class="mr-3 white">hello@mucca.ro</a>
                                    </div>
                                </div>
                                <div class="col-xl-3 offset-xl-1 follow-case text-center text-md-left">
                                    <p>Follow us</p>
                                    <a href="https://www.instagram.com/mucca_production_advertising/" target="_blank" rel="noopener" class="d-block white">Instagram</a>
                                    <a href="https://www.linkedin.com/company/mucca-production-&amp;-advertising" target="_blank" rel="noopener" class="white">Linkedin</a>
                                </div>
                            </div>
                            <div class="row mt-auto">
                                <div class="col-12">
                                    <span class="d-block text-center text-md-right mt-4 mt-lg-0 mb-5"><small>Copyright © 2021 Mucca. <span lang="en">Powered by the Universe.</span></small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
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
        },
    },
}
</script>
<style>
span.active {
    color: #65D07D;
}
</style>
