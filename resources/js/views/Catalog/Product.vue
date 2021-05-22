<template>
    <div v-if="!loading" class="products-filter-wrapper d-flex flex-column">
        <div class="product container-fluid pad-left-catalog mb-5">

            <div class="row mb-5">

                <div class="col-md-5 mb-5 mb-md-0">

                    <div class="breadcrumbs mb-5">
                        <a :href=" (lang == 'en' ? '/en' : '') + '/' ">Home</a> /
                        <router-link :to="(lang == 'en' ? '/en' : '') + '/catalog'">All</router-link>
                        /
                        <router-link :to="{path:(lang == 'en' ? '/en' : '') + '/catalog', query:{category: encodeURIComponent(product.first_category.name_ro)}}">
                            {{lang == 'ro' ? product.first_category.name_ro : product.first_category.name_en}}
                        </router-link>
                        /
                        <router-link
                            :to="{path:(lang == 'en' ? '/en' : '') + '/catalog', query:{category: encodeURIComponent(product.first_category.name_ro), subcategory: encodeURIComponent(product.first_subcategory.name_ro)}}">
                            {{lang == 'ro' ? product.first_subcategory.name_ro : product.first_subcategory.name_en}}
                        </router-link>
                        /
                    </div>

                    <span class="product-code">cod {{ product.product_code }}</span>
                    <h3 class="product-title mt-5 mb-4">{{ product.name }}</h3>
                    <p class="product-description mb-5">{{ product.description }}</p>
                    <div v-if="colors.length > 0" class="product-colors d-flex flex-wrap">
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
                    <ul class="slider-thumbs d-flex justify-content-center flex-wrap ml-0 px-3" :class="{'many': (images.length > 7 ? true : false)}" >
                        <li v-for="(image, index) in images" :key="index">
                            <button class="thumb" :style="'background-image: url(..'+image+');'" @click="$refs.slider.goTo(index)"><!-- --></button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="slider-wrapper pad-left-catalog mb-5">
            <p class="pad-left-mobile pl-lg-0 pad-right-mobile text-center text-sm-left"><strong>{{lang == 'ro' ? 'S-ar putea să-ți placă și următoarele produse' : 'You may also like the following products...'}}</strong></p>
            <VueSlickCarousel class="slider-browse" v-bind="settings_browse">
                <div class="slide slide-browse" v-for="(prod,index) in products" :key="prod.id">
                    <router-link :to="(lang == 'en' ? '/en' :'') + '/catalog/'+prod.slug">
                        <img :src="prod.filename" class="img-fluid mb-3" :alt="'catalog-product-'+index">
                    </router-link>
                    <h4>
                        <router-link :to="(lang == 'en' ? '/en' :'') + '/catalog/'+prod.slug">{{ prod.name }}</router-link>
                    </h4>
                    <router-link :to="(lang == 'en' ? '/en' :'') + '/catalog/'+prod.slug" class="browse-link d-flex align-items-center mt-auto">
                        <img src="/img/cross_product.png" srcset="/img/cross_product.svg 1x" class="img-fluid mr-3" alt="">
                        <span class="mb-0">{{lang == 'ro' ? 'Vezi produs' : 'See product'}}</span>
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
    beforeRouteEnter (to, from, next) {
        axios.get('/api/products/' + to.params.slug).then(response => {
            next(vm => vm.setData(response.data))
        }).catch(error => {
            if (error.response.status === 404) {
                next(vm => {
                    vm.$router.replace((vm.lang == 'en' ? '/en' :'') + '/catalog/404')
                })
            };
        });
    },
    beforeRouteUpdate (to, from, next) {
        axios.get('/api/products/' + to.params.slug).then(response => {
            this.setData(response.data)
            next()
        }).catch(error => {
            if (error.response.status === 404) {
                this.$router.replace((this.lang == 'en' ? '/en' :'') + '/catalog/404')
            };
        });
    },
    methods: {
        setData(data) {
            this.product = data.product;
            this.products = data.products;
            this.colors = data.colors;
            this.images = data.images;
            this.loading = false;
            window.scrollTo(0, 0);

            document.title = this.product.name + ' - Mucca - Playfully Committed';
            document.querySelector('head meta[name="description"]').setAttribute('content', this.product.description);
        }
    },
    computed:{
        lang(){
            if(this.$route.path.split('/')[1] == 'en') {
                return 'en';
            }
            else return 'ro';
        },
    },
}
</script>
