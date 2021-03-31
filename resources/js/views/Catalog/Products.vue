<template>
    <div class="products-filter-wrapper">

        <div class="filter-menu d-flex flex-column flex-md-row justify-content-between pl-lg-5 mb-4 mb-md-5">
            <div class="breadcrumbs order-2 order-lg-1">
                <a href="#">Home / All /</a>
            </div>

            <div class="order-1 order-lg-2 d-flex d-lg-block mb-4 mb-md-0">
                <button class="btn btn-randomize mr-2 mr-md-4">Randomize</button>
                <button class="btn btn-search" @click="show_filter = !show_filter">
                    <span>Search / Filter</span>
                    <img src="/img/stoggler_search.png" srcset="/img/toggler_search.svg 1x" class="img-fluid">
                </button>
                <div id="search-menu" v-bind:class="{show: show_filter}">
                    <form action="" method="POST" class="form search-form catalog-form show">
                        <button type="button" id="close-search-menu" class="ml-auto"  @click="show_filter = !show_filter">
                            <img src="/img/search_menu_close.png" srcset="/img/search_menu_close.svg 1x"
                                 class="img-fluid mb-5">
                        </button>
                        <div class="input-group input-group-catalog">
                            <input type="text" class="form-control" placeholder="COD PRODUS / CUVÂNT"
                                   aria-label="Username" aria-describedby="search">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="search"><img src="/img/icon_search.png"
                                                                                srcset="/img/icon_search.svg 1x"
                                                                                alt="icon-search"
                                                                                class="img-fluid"></span>
                                <span for="#search" class="search-span">Search</span>
                            </div>
                        </div>
                        <div class="input-group input-group-catalog">
                            <span class="search-span">Categorie</span>
                            <select id="input-category" class="form-control">
                                <option selected>All</option>
                            </select>
                        </div>
                        <div class="input-group input-group-catalog">
                            <span class="search-span">Subcategorie</span>
                            <select id="input-subcategory" class="form-control">
                                <option selected>Technology</option>
                            </select>
                        </div>
                        <div class="input-group input-group-catalog">
                            <span class="search-span">Culoare</span>
                            <select id="input-color" class="form-control">
                                <option selected>All</option>
                            </select>
                        </div>
                        <div class="d-flex form-catalog-buttons justify-content-between">
                            <button type="submit" class="btn btn-apply">Apply</button>
                            <button type="reset" class="btn btn-clear">Clear all</button>
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
            v-model="request.current_page"
            @input="changeUrl"
            :total-rows="nr_products"
            :per-page="request.per_page"
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
            request: {
                per_page: 12,
                search: null,
                category: null,
                subcategory: null,
                color: null,
                current_page: 1
            },
            products: null,
            nr_products: 1000000,
            show_filter: false,
            error: null,
        }
    },
    created() {
        if (this.$route.query.search != undefined){
            this.request.search = this.$route.query.search;
        }
        if (this.$route.query.category != undefined){
            this.request.category = this.$route.query.category;
        }
        if (this.$route.query.subcategory != undefined){
            this.request.subcategory = this.$route.query.subcategory;
        }
        if (this.$route.query.color != undefined){
            this.request.color = this.$route.query.color;
        }
        if (this.$route.query.current_page != undefined){
            this.request.current_page = parseInt(this.$route.query.current_page);
        }
        this.showProducts();
    },
    methods:{
        showProducts() {
            var crt = JSON.parse(JSON.stringify(this.request.current_page))
            axios.post('/api/products', this.request)
                .then(response => {
                    this.nr_products = response.data.nr_products;
                    this.products = response.data.products;
                    console.log(this.request.current_page);
                }).catch(error => {
            });
            console.log(this.request.current_page);
        },
        changeUrl() {
            this.showProducts()
            var query = {}
            if (this.request.search != null){
                query.search = this.request.search;
            }
            if (this.request.category != null){
                query.category = this.request.category;
            }
            if (this.request.subcategory != null){
                query.subcategory = this.request.subcategory;
            }
            if (this.request.color != null){
                query.color = this.request.color;
            }
            if (this.request.current_page != 1){
                query.current_page = this.request.current_page;
            }
            this.$router.push({path:this.$route.path , query:query});
        },
    }
}
</script>

<style scoped>

</style>
