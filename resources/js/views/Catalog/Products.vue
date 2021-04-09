<template>
    <div>
        <h1 v-if="loading">Loading</h1>
        <div v-if="!loading" class="products-filter-wrapper">

            <div class="filter-menu d-flex justify-content-end pl-lg-5 mb-4 mb-md-5">
                <!--            <div class="breadcrumbs order-2 order-lg-1">-->
                <!--                <a href="/">Home</a> / <router-link to="/catalog">All</router-link> /-->
                <!--            </div>-->

                <div class="order-1 order-lg-2 d-flex d-lg-block mb-4 mb-md-0">
                    <button @click="randomize" class="btn btn-randomize mr-2 mr-md-4">Randomize</button>
                    <button class="btn btn-search" @click="show_filter = !show_filter">
                        <span>Search / Filter</span>
                        <img src="/img/stoggler_search.png" srcset="/img/toggler_search.svg 1x" class="img-fluid">
                    </button>
                    <div id="search-menu" v-bind:class="{show: show_filter}">
                        <form @submit.prevent class="form search-form catalog-form show">
                            <button type="button" id="close-search-menu" class="ml-auto"
                                    @click="show_filter = !show_filter">
                                <img src="/img/search_menu_close.png" srcset="/img/search_menu_close.svg 1x"
                                     class="img-fluid mb-5">
                            </button>
                            <div class="input-group input-group-catalog">
                                <input type="text" class="form-control" v-model="search"
                                       placeholder="COD PRODUS / CUVÂNT" aria-label="Username"
                                       aria-describedby="search">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="search"><img src="/img/icon_search.png"
                                                                                    srcset="/img/icon_search.svg 1x"
                                                                                    alt="icon-search" class="img-fluid"></span>
                                    <label for="search" class="search-label">Search</label>
                                </div>
                            </div>
                            <div class="input-group input-group-catalog">
                                <label for="input-category" class="search-label">Categorie</label>
                                <b-form-select @change="resetSubcategory" id="input-scategory"
                                               class="form-control custom-select"
                                               v-model="category">
                                    <option :value="null">All</option>
                                    <option v-for="category in categories" :value="category">{{
                                            category.name_ro
                                        }}
                                    </option>
                                </b-form-select>
                            </div>
                            <div class="input-group input-group-catalog">
                                <label for="input-subcategory" class="search-label">Subcategorie</label>
                                <b-form-select id="input-subcategory" class="form-control custom-select" v-model="subcategory">
                                    <option :value="null">All</option>
                                    <option v-for="subcat in subcategoryOptions" :value="subcat">{{ subcat.name_ro }}
                                    </option>
                                </b-form-select>
                            </div>
                            <b-button v-b-toggle href="#example-collapse" @click.prevent>Culori</b-button>
                            <!--                        <div class="input-group input-group-catalog">-->
                            <!--                            <span class="search-label">Culoare</span>-->
                            <!--                            <select id="input-color" class="form-control">-->
                            <!--                                <option selected>All</option>-->
                            <!--                            </select>-->
                            <b-collapse id="example-collapse" class="input-group input-group-catalog">
                                <b-form-checkbox
                                    v-for="color in colors"
                                    v-model="selected_colors"
                                    :key="color.id"
                                    :value="color.name"
                                    inline
                                    plain
                                    class="color-check"
                                >
                                <span class="color-label" :class="(color.hex_code == 'FFFFFF') ? 'is-white' : ''"
                                      :style="'background-color:#'+ color.hex_code"><!-- --></span>
                                </b-form-checkbox>
                            </b-collapse>
                            <!--                        </div>-->
                            <div class="d-flex form-catalog-buttons justify-content-between">
                                <button @click="changeFilter" class="btn btn-apply">Apply</button>
                                <button @click="resetFilter" class="btn btn-clear">Clear all</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="products pl-lg-5">

                <div class="row">
                    <h4 v-if="products.length == 0">Ups, no products found!</h4>
                    <div v-for="product in products" class="col-6 col-lg-3 product-case mb-4 mb-lg-0 mt-4">
                        <img :src="product.filename" class="img-fluid mb-3">
                        <p>{{ product.name }}</p>
                        <router-link :to="{ name: 'product', params: {slug: product.slug } }"
                                     class="d-flex align-items-center">
                            <img src="/img/cross_product.png" srcset="/img/cross_product.svg 1x" class="img-fluid mr-3">
                            <p class="mb-0">Vezi produs</p>
                        </router-link>
                    </div>
                </div>

            </div>
            <b-pagination v-if="products.length != 0"
                          v-model="current_page "
                          @input="changePage"
                          :total-rows="nr_products"
                          :per-page="per_page"
                          class=" my-5 d-flex justify-content-center align-items-center py-5"
                          size="lg"
            ></b-pagination>
        </div>
    </div>
</template>
<script>
import store from "../../store";

export default {
    name: "Products",
    data: function () {
        return {

            loading: true,
            category: null,
            subcategory: null,
            selected_colors: [],
            search: null,

            query_colors: [],
            query_subcategory: null,
            query_category: null,
            query_search: null,
            per_page: 12,
            current_page: 1,

            products: [],

            show_filter: false,
            watch: true,
            error: null,
        }
    },
    watch: {
        show_filter: function (val) {
            this.closeFilter();
        },
        url_current_page: function (val) {
            this.current_page = val;
            this.closeFilter();
            this.showProducts()
        },
        url_search: function (val) {
            this.query_search = val;
            this.closeFilter();
            this.showProducts()
        },
        url_subcategory: function (val) {
            this.query_subcategory = val;
            this.closeFilter();
            this.showProducts()
        },
        url_category: function (val) {
            this.query_category = val;
            this.closeFilter();
            this.showProducts()
        },
        url_colors: function (val) {
            this.query_colors = val;
            this.closeFilter();
            this.showProducts()
        }
    },
    computed: {
        url_search() {
            if (this.$route.query.search != undefined) {
                return decodeURIComponent(this.$route.query.search);
            } else return null;
        },
        url_current_page() {
            if (this.$route.query.current_page != undefined) {
                return this.$route.query.current_page;
            } else return null;
        },
        url_subcategory() {
            if (this.$route.query.subcategory != undefined) {
                return decodeURIComponent(this.$route.query.subcategory);
            } else return null;
        },
        url_category() {
            if (this.$route.query.category != undefined) {
                return decodeURIComponent(this.$route.query.category);
            } else return null;
        },
        url_colors() {
            if (this.$route.query.colors != undefined) {
                var colors = this.$route.query.colors;
                if (!Array.isArray(this.$route.query.colors)) {
                    colors = [colors];
                }
                return colors.map(function (x) {
                    return decodeURIComponent(x);
                });
            } else return [];
        },
        subcategoryOptions() {
            if (this.category != null) {
                return this.category.subcategories;
            } else
                return [];
        },
        colors() {
            return this.$store.getters.getColors;
        },
        nr_products: {
            get() {
                return this.$store.getters.getCount;
            },
            set(newValue) {
                this.$store.commit('setCount', newValue);
            }
        },
        categories() {
            return this.$store.getters.getCategories;
        },
    },
    created() {
        this.$store.dispatch('categories').then(() => {
                this.create();
            }
        );
    },
    methods: {
        showProducts() {
            this.loading = true;
            axios.post('/api/products', {
                colors: this.query_colors.length > 0 ? this.query_colors : null,
                subcategory: this.query_subcategory,
                category: this.query_category,
                search: this.query_search,
                per_page: this.per_page,
                current_page: this.current_page
            }).then(response => {
                this.nr_products = response.data.nr_products;
                this.products = response.data.products;
            }).catch(error => {
            });
            this.loading = false;

        },
        changeFilter(e) {
            e.preventDefault();
            if (this.search != null || this.category != null || this.subcategory != null || this.selected_colors.length != 0) {
                this.query_search = this.search != null ? this.search : null;
                this.query_category = this.category != null ? this.category.name_ro : null;
                this.query_subcategory = this.subcategory != null ? this.subcategory.name_ro : null;
                this.query_colors = this.selected_colors.length != 0 ? this.selected_colors : [];
                this.current_page = 1;
                this.changeUrl();
                this.showProducts()
            }
            this.show_filter = false;
        },
        changeUrl() {
            var query = {}
            if (this.query_search != null) {
                query.search = encodeURIComponent(this.query_search);
            }
            if (this.query_category != null) {
                query.category = encodeURIComponent(this.query_category);
            }
            if (this.query_subcategory != null) {
                query.subcategory = encodeURIComponent(this.query_subcategory);
            }
            if (this.query_colors.length != 0) {

                query.colors = this.query_colors.map(function (x) {
                    return encodeURIComponent(x);
                });
                ;
            }
            if (this.current_page != 1) {
                query.current_page = this.current_page;
            }
            this.$router.push({path: '/catalog', query: query}).catch(err => err);
        },
        changePage() {
            this.changeUrl();
            this.showProducts();
        },
        resetParams() {
            if (this.search != null || this.category != null || this.subcategory != null || this.selected_colors.length != 0) {
                this.current_page = 1;
            }
            this.query_search = null;
            this.query_category = null;
            this.query_subcategory = null;
            this.query_colors = [];
        },

        resetFilter() {
            if (this.selected_category != null) {
                this.$store.commit('setSelected', null);
                this.show_filter = false;
            } else {
                this.resetParams();
                this.closeFilter();
                if (this.current_page != 1) {
                    this.$router.push({path: '/catalog', query: {current_page: this.current_page}}).catch(err => err);
                } else this.$router.push({path: '/catalog', query: null}).catch(err => err);
                this.show_filter = false;
                this.showProducts();
            }
        },
        closeFilter() {
            this.category = this.query_category != null ? this.categories.find(el => el.name_ro == this.query_category) : null;
            this.subcategory = this.query_category != null && this.query_subcategory != null ? this.category.subcategories.find(el => el.name_ro == this.query_subcategory) : null;
            this.selected_colors = this.query_colors;
            this.search = this.query_search;
        },
        resetSubcategory() {
            this.subcategory = null;
        },
        randomize() {
            this.resetParams();
            this.closeFilter();
            this.show_filter = false;
            this.current_page = 1;
            this.$router.push({path: '/catalog', query: null}).catch(err => err);
            axios.get('/api/products/random').then(response => {
                this.nr_products = response.data.nr_products;
                this.products = response.data.products;
            }).catch(error => {
            });
        },
        create() {
            if (this.$route.query.search != undefined) {
                this.query_search = decodeURIComponent(this.$route.query.search);
                this.search = decodeURIComponent(this.$route.query.search);
            }
            if (this.$route.query.category != undefined) {
                this.category = this.categories.find(el => el.name_ro == decodeURIComponent(this.$route.query.category));
                this.query_category = decodeURIComponent(this.$route.query.category);

            }
            if (this.$route.query.subcategory != undefined) {
                this.subcategory = this.subcategoryOptions.find(el => el.name_ro == decodeURIComponent(this.$route.query.subcategory));
                this.query_subcategory = decodeURIComponent(this.$route.query.subcategory);
            }
            if (this.$route.query.colors != undefined) {
                var colors = this.$route.query.colors;
                if (!Array.isArray(this.$route.query.colors)) {
                    colors = [colors];
                }
                this.selected_colors = colors.map(function (x) {
                    return decodeURIComponent(x);
                });
                this.query_colors = colors.map(function (x) {
                    return decodeURIComponent(x);
                });
            }
            if (this.$route.query.current_page != undefined) {
                this.current_page = parseInt(this.$route.query.current_page);
            }
            this.showProducts();
        }
    },
    beforeRouteUpdate(to, from, next) {
        if (to.query.search != undefined || to.query.subcategory != undefined || to.query.colors != undefined) {
            this.watch = false;
            if (to.query.category != undefined) {
                this.$store.commit('setSelected', decodeURIComponent(to.query.category));
            } else this.$store.commit('setSelected', null);
        } else if (to.query.category != undefined) {
            this.$store.commit('setSelected', decodeURIComponent(to.query.category));
        } else if (to.query.category == undefined) {
            this.$store.commit('setSelected', null);
        }
        next();
    }
}
</script>

<style scoped>

</style>
