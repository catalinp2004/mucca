<template>
    <div v-if="!loading" class="products-filter-wrapper d-flex flex-column">
        <div class="product container-fluid pad-left-catalog mb-5">

            <div class="row mb-5">

                <div class="col-md-5 mb-5 mb-md-0">

                    <div class="breadcrumbs mb-5">
                        <a href="/">Home</a> /
                        <router-link to="/catalog">All</router-link>
                        /
                        <router-link :to="{path:'/catalog', query:{category: encodeURIComponent(product.first_category)}}">
                            {{ product.first_category }}
                        </router-link>
                        /
                        <router-link
                            :to="{path:'/catalog', query:{category: encodeURIComponent(product.first_category), subcategory: encodeURIComponent(product.first_subcategory)}}">
                            {{ product.first_subcategory }}
                        </router-link>
                        /
                    </div>

                    <span class="product-code">cod {{ product.product_code }}</span>
                    <h3 class="product-title mt-5 mb-4">{{ product.name }}</h3>
                    <p class="product-description mb-5">{{ product.description }}</p>
                    <div class="product-colors d-flex flex-wrap">
                        <span class="colors-title">Colors</span>
                        <span v-for="color in colors" :key="color.id" class="color" :style="'background-color:#'+color.hex_code+';'"><!-- --></span>

                    </div>
                </div>
                <div class="col-md-7 pad-right-catalog pr-md-0 position-relative">
                    <VueSlickCarousel ref="slider" id="slider" v-bind="settings_slider">
                            <div class="slide" v-for="(image, index) in images" :key="index">
                                <img :src="image" class="img-slide" alt="catalog-product-1">
<!--                                <a href="#" class="zoom-icon" data-toggle="lightbox" data-gallery="gallery-1" :data-remote="image">-->
<!--                                    <img src="/img/zoom_in.png" srcset="/img/zoom_in.svg 1x" class="img-fluid" alt="">-->
<!--                                </a>-->
                            </div>
                    </VueSlickCarousel>
                    <ul class="slider-thumbs d-flex ml-0 px-0">
                        <li v-for="(image, index) in images" :key="index">
                            <button class="thumb" :style="'background-image: url(..'+image+');'" @click="$refs.slider.goTo(index)"><!-- --></button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="slider-wrapper pad-left-catalog mb-5">
            <p class="pad-left-mobile pl-lg-0 pad-right-mobile text-center text-sm-left"><strong>S-ar putea să-ți placă și următoarele produse</strong></p>
            <VueSlickCarousel class="slider-browse" v-bind="settings_browse">
                <div class="slide slide-browse" v-for="(prod,index) in products" :key="prod.id">
                    <router-link :to="'/catalog/'+prod.slug">
                        <img :src="prod.filename" class="img-fluid mb-3" :alt="'catalog-product-'+index">
                    </router-link>
                    <h4>
                        <router-link :to="'/catalog/'+prod.slug">{{ prod.name }}</router-link>
                    </h4>
                    <router-link :to="'/catalog/'+prod.slug" class="browse-link d-flex align-items-center mt-auto">
                        <img src="/img/cross_product.png" srcset="/img/cross_product.svg 1x" class="img-fluid mr-3" alt="">
                        <a class="mb-0">Vezi produs</a>
                    </router-link>
                </div>
            </VueSlickCarousel>
        </div>
    </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
// optional style for arrows & dots
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
export default {

    name: "Product",
    components: { VueSlickCarousel },
    data() {
        return {
            product: null,
            products: null,
            colors: null,
            images: null,
            loading: true,
            settings_slider:{
                autoplay: true,
                autoplaySpeed: 5000,
                pauseOnFocus: false,
                pauseOnHover: false,
                swipeToSlide: true,
                vertical: true,
                arrows: false,
                adaptiveHeight: true
            },
            settings_browse: {
                autoplay: true,
                autoplaySpeed: 5000,
                pauseOnFocus: false,
                pauseOnHover: false,
                slidesToScroll: 1,
                slidesToShow: 5,
                swipeToSlide: true,
                dots: true,
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            centerMode: true,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            centerMode: true,
                            centerPadding: '60px',
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                            centerMode: true,
                            centerPadding: '60px',
                        }
                    },
                ]
            }

        }

    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get('/api/products/' + this.url_slug).then(response => {
                this.product = response.data.product;
                this.products = response.data.products;
                this.colors = response.data.colors;
                this.images = response.data.images;
                this.loading = false;
            }).catch(error => {
                if (error.response.status === 404) {
                    this.$router.replace('/catalog/404')
                };
            });
        }
    },
    computed:{
        url_slug() {
            return this.$route.params.slug;
        }
    },
    watch: {
        url_slug: function (val) {
            this.getData();
        },
    }
}
</script>
