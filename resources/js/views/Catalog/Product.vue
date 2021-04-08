<template>
    <div v-if="!loading" class="products-filter-wrapper">

        <div class="filter-menu d-flex flex-column flex-md-row justify-content-between pl-lg-5 mb-4 mb-md-5">
            <div class="breadcrumbs order-2 order-lg-1 pad-left-catalog pl-lg-0">
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
        </div>

        <div class="product container-fluid pad-left-catalog pl-lg-5">

            <div class="row mb-5">

                <div class="col-md-5 mb-5 mb-md-0">
                    <span class="product-code">cod {{ product.product_code }}</span>
                    <h3 class="product-title mt-5 mb-4">{{ product.name }}</h3>
                    <p class="product-description mb-5">{{ product.description }}</p>
                    <div class="product-colors d-flex flex-wrap">
                        <span class="colors-title">Colors</span>
                        <span v-for="color in product.colors" class="color"
                              :style="'background-color:#'+color.hex_code+';'"><!-- --></span>

                    </div>
                </div>
                <swiper :thumbs="{ swiper: thumbsSwiper }" class="col-md-7 pad-right-catalog pr-md-0 position-relative"> ... </swiper>

                <!-- Thumbs Swiper -> store swiper instance -->
                <!-- It is also required to set watchSlidesVisibility and watchSlidesProgress props -->
                <swiper
                    @swiper="setThumbsSwiper"
                    watch-slides-visibility
                    watch-slides-progress
                >
                    ...
                </swiper>

                <!--                <div class="col-md-7 pad-right-catalog pr-md-0 position-relative">-->
                <!--                    <div id="slider">-->
                <!--                        <div class="slide" >-->
                <!--                            <img src="assets/tower_slide_1.jpg" class="img-fluid img-slide" alt="catalog-product-1">-->
                <!--                            <a href="#" class="zoom-icon" data-toggle="lightbox" data-gallery="gallery-1" data-remote="assets/tower_slide_1.jpg">-->
                <!--                                <img src="assets/zoom_in.png" srcset="assets/zoom_in.svg 1x" class="img-fluid" alt="">-->
                <!--                            </a>-->
                <!--                        </div>-->
                <!--                        <div class="slide" >-->
                <!--                            <img src="assets/tower_slide_2.jpg" class="img-fluid img-slide" alt="catalog-product-2">-->
                <!--                            <a href="#" class="zoom-icon" data-toggle="lightbox" data-gallery="gallery-1" data-remote="assets/tower_slide_2.jpg">-->
                <!--                                <img src="assets/zoom_in.png" srcset="assets/zoom_in.svg 1x" class="img-fluid" alt="">-->
                <!--                            </a>-->
                <!--                        </div>-->
                <!--                        <div class="slide" data-toggle="lightbox">-->
                <!--                            <img src="assets/tower_slide_3.jpg" class="img-fluid img-slide" alt="catalog-product-3">-->
                <!--                            <a href="#" class="zoom-icon" data-toggle="lightbox" data-gallery="gallery-1" data-remote="assets/tower_slide_3.jpg">-->
                <!--                                <img src="assets/zoom_in.png" srcset="assets/zoom_in.svg 1x" class="img-fluid" alt="">-->
                <!--                            </a>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <ul class="slider-thumbs d-flex">-->
                <!--                        <li>-->
                <!--                            <button class="thumb thumb-1" data-slide-nr="1">&lt;!&ndash; &ndash;&gt;</button>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <button class="thumb thumb-2" data-slide-nr="2">&lt;!&ndash; &ndash;&gt;</button>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <button class="thumb thumb-3" data-slide-nr="3">&lt;!&ndash; &ndash;&gt;</button>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </div>-->
            </div>

        </div>

    </div>
</template>

<script>
import SwiperCore, {Thumbs} from 'swiper';
import {Swiper, SwiperSlide} from 'swiper/vue';

SwiperCore.use([Thumbs]);

export default {

    name: "Product",
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            product: null,
            thumbsSwiper: null,
            loading: true,
        }
    },
    created() {
        axios.get('/api/products/' + this.$route.params.slug).then(response => {
            this.product = response.data.product;
            this.loading = false;
        }).catch(error => {
        });
    },
    methods: {
        setThumbsSwiper(swiper) {
            this.thumbsSwiper = swiper;
        },
    },
}
</script>

<style scoped>

</style>
