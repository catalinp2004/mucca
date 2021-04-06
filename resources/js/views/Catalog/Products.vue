<template>
    <div class="products-filter-wrapper">

        <div class="filter-menu d-flex flex-column flex-md-row justify-content-between pl-lg-5 mb-4 mb-md-5">
            <div class="breadcrumbs order-2 order-lg-1">
                <a v-if="this.$route.query.category == undefined ">Home / All /</a>
                <a v-else>Home / {{decodeURIComponent(this.$route.query.category)}} /</a>
            </div>

            <div class="order-1 order-lg-2 d-flex d-lg-block mb-4 mb-md-0">
                <button class="btn btn-randomize mr-2 mr-md-4">Randomize</button>
                <button class="btn btn-search" @click="show_filter = !show_filter">
                    <span>Search / Filter</span>
                    <img src="/img/stoggler_search.png" srcset="/img/toggler_search.svg 1x" class="img-fluid">
                </button>
                <div id="search-menu" v-bind:class="{show: show_filter}">
                    <form @submit.prevent class="form search-form catalog-form show">
                        <button type="button" id="close-search-menu" class="ml-auto"  @click="show_filter = !show_filter">
                            <img src="/img/search_menu_close.png" srcset="/img/search_menu_close.svg 1x"
                                 class="img-fluid mb-5">
                        </button>
                        <div class="input-group input-group-catalog">
                            <input type="text" class="form-control" v-model="search" placeholder="COD PRODUS / CUVÂNT"
                                   aria-label="Username" aria-describedby="search">
                            <div class="input-group-prepend">
                                <span class="input-group-text"  id="search"><img src="/img/icon_search.png" srcset="/img/icon_search.svg 1x" alt="icon-search" class="img-fluid"></span>
                                <span for="#search" class="search-span">Search</span>
                            </div>
                        </div>
                        <div class="input-group input-group-catalog">
                            <span class="search-span">Categorie</span>
                            <b-form-select  id="input-category" class="form-control" v-model="category">
                                <option :value="null">All</option>
                                <option v-for="category in categories" :value="category">{{category.name_ro}}</option>
                            </b-form-select>
                        </div>
                        <div class="input-group input-group-catalog">
                            <span class="search-span">Subcategorie</span>
                            <b-form-select  id="input-category" class="form-control" v-model="subcategory">
                                <option :value="null">All</option>
                                <option v-for="subcategory in subcategoryOptions" :value="subcategory">{{subcategory.name_ro}}</option>
                            </b-form-select>
                        </div>
                        <div class="input-group input-group-catalog">
                            <span class="search-span">Culoare</span>
                            <select id="input-color" class="form-control">
                                <option selected>All</option>
                            </select>
                        </div>
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
                <div v-for="product in products" class="col-6 col-lg-3 product-case mb-4 mb-lg-0 mt-4">
                    <img :src="'/storage/img/products'+product.filename" class="img-fluid mb-3">
                    <p>{{ product.name }}</p>
                    <router-link :to="'/catalog/'+product.slug" class="d-flex align-items-center">
                        <img src="/img/cross_product.png" srcset="/img/cross_product.svg 1x" class="img-fluid mr-3">
                        <p class="mb-0">Vezi produs</p>
                    </router-link>
                </div>
            </div>

        </div>
        <b-pagination
            v-model="current_page "
            @input="changeUrl"
            :total-rows="nr_products"
            :per-page="per_page"
            class=" my-5 d-flex justify-content-center align-items-center py-5"
            size="lg"
        ></b-pagination>
    </div>
</template>
<script>
export default {
    name: "Products",
    data: function () {
        return {
            category: null,
            subcategory: null,
            colors: null,
            search:null,

            query_colors: null,
            query_subcategory: null,
            query_category: null,
            query_search: null,
            per_page: 12,
            current_page: 1,

            products: null,
            nr_products: this.$store.getters.getCount,
            categories: this.$store.getters.getCategories,

            show_filter: false,
            error: null,
        }
    },
    watch:{
        category: function (val) {
            this.subcategory = null;
        },
        show_filter: function (val) {
            this.closeFilter();
        },
        selected_category: function (val) {
          this.resetFilter();
          this.query_category = val;
          this.category = this.categories.find(el => el.name_ro == val);
          this.changeUrl();
        }

    },
    computed:{
        subcategoryOptions(){
            if (this.category != null){
                return this.category.subcategories;
            }
            else
                return [];
        },
        selected_category(){
            return this.$store.getters.getSelected;
        },
    },
    created() {
        if (this.$route.query.search != undefined){
            this.query_search = this.$route.query.search;
            this.search = this.$route.query.search;
        }
        if (this.$route.query.category != undefined){
            this.category = this.categories.find(el => el.name_ro == decodeURIComponent(this.$route.query.category));
            this.query_category = decodeURIComponent(this.$route.query.category);
        }
        if (this.$route.query.subcategory != undefined){
            this.subcategory = this.category.subcategories.find(el => el.name_ro == decodeURIComponent(this.$route.query.subcategory));
            this.query_subcategory =  decodeURIComponent(this.$route.query.subcategory);
        }
        if (this.$route.query.colors != undefined){
            this.colors = this.$route.query.color;
        }
        if (this.$route.query.current_page != undefined){
            this.current_page = parseInt(this.$route.query.current_page);
        }
        this.showProducts();
    },
    methods:{
        showProducts() {
            axios.post('/api/products', {
                colors: this.query_colors,
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
        },
        changeFilter(e){
                e.preventDefault();
                if (this.search != null || this.category != null || this.subcategory != null || this.colors != null) {
                    this.query_search = this.search != null ? this.search : null;
                    this.query_category = this.category != null ? this.category.name_ro : null;
                    this.query_subcategory = this.subcategory != null ? this.subcategory.name_ro : null;
                    this.query_colors =  this.colors != null ? this.colors : null;
                    this.current_page = 1;
                    this.changeUrl();
                }
                this.show_filter = false;
        },
        changeUrl() {
            var query = {}
            if (this.query_search != null){
                query.search = this.query_search;
            }
            if (this.query_category != null){
                query.category = encodeURIComponent(this.query_category);
            }
            if (this.query_subcategory != null){
                query.subcategory = encodeURIComponent(this.query_subcategory);
            }
            if (this.query_colors != null){
                query.colors = this.query_colors;
            }
            if (this.current_page  != 1){
                query.current_page = this.current_page ;
            }
            this.$router.replace({'query': query}).catch(err=>err);
            this.showProducts()
        },
        resetFilter() {
            if (this.search != null || this.category != null || this.subcategory != null || this.colors != null) {
                this.current_page  = 1;
            }
            this.query_search = null;
            this.query_category = null;
            this.query_subcategory = null;
            this.query_colors = null;

            if (this.current_page  != 1){
                this.$router.replace({'query': {current_page: this.current_page }}).catch(err=>err);
            } else this.$router.replace({'query': null}).catch(err=>err);
            this.show_filter = false;
        },
        closeFilter(){
            this.category = this.category != null ? this.categories.find(el => el.name_ro == decodeURIComponent(this.query_category)): null;
            this.subcategory = this.subcategory != null ? this.category.subcategories.find(el => el.name_ro == decodeURIComponent(this.query_subcategory)): null;
            this.colors = this.query_colors;
            this.search =this.query_search;
        }
    }
}
</script>

<style scoped>

</style>
