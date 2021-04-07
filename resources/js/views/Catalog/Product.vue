<template>
    <div class="products-filter-wrapper">

        <div class="filter-menu d-flex flex-column flex-md-row justify-content-between pl-lg-5 mb-4 mb-md-5">
            <div class="breadcrumbs order-2 order-lg-1 pad-left-catalog pl-lg-0">
                <a href="#">Home / All / Eating & Drinking / Tower /</a>
            </div>
        </div>

        <div class="product container-fluid pad-left-catalog pl-lg-5">

            <div class="row mb-5">

                <div class="col-md-5 mb-5 mb-md-0">
                    <span class="product-code">cod MO8656</span>
                    <h3 class="product-title mt-5 mb-4">Tower on two<br> lines</h3>
                    <p class="product-description mb-5">Drinking bottle in Tritan™ which is BPA free. Leak-free. It is supplied with a small drinking glass. Capacity: 700 ml. Leak free.</p>
                    <div class="product-colors d-flex flex-wrap">
                        <span class="colors-title">Colors</span>
                        <span class="color" style="background-color:#D3C0C0;"><!-- --></span>
                        <span class="color" style="background-color:#BC3A3A;"><!-- --></span>
                        <span class="color" style="background-color:#7B9FC3;"><!-- --></span>
                        <span class="color" style="background-color:#9A9A9A;"><!-- --></span>
                    </div>
                </div>

                <div class="col-md-7 pad-right-catalog pr-md-0 position-relative">
                    <div id="slider">
                        <div class="slide" >
                            <img src="assets/tower_slide_1.jpg" class="img-fluid img-slide" alt="catalog-product-1">
                            <a href="#" class="zoom-icon" data-toggle="lightbox" data-gallery="gallery-1" data-remote="assets/tower_slide_1.jpg">
                                <img src="assets/zoom_in.png" srcset="assets/zoom_in.svg 1x" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="slide" >
                            <img src="assets/tower_slide_2.jpg" class="img-fluid img-slide" alt="catalog-product-2">
                            <a href="#" class="zoom-icon" data-toggle="lightbox" data-gallery="gallery-1" data-remote="assets/tower_slide_2.jpg">
                                <img src="assets/zoom_in.png" srcset="assets/zoom_in.svg 1x" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="slide" data-toggle="lightbox">
                            <img src="assets/tower_slide_3.jpg" class="img-fluid img-slide" alt="catalog-product-3">
                            <a href="#" class="zoom-icon" data-toggle="lightbox" data-gallery="gallery-1" data-remote="assets/tower_slide_3.jpg">
                                <img src="assets/zoom_in.png" srcset="assets/zoom_in.svg 1x" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <ul class="slider-thumbs d-flex">
                        <li>
                            <button class="thumb thumb-1" data-slide-nr="1"><!-- --></button>
                        </li>
                        <li>
                            <button class="thumb thumb-2" data-slide-nr="2"><!-- --></button>
                        </li>
                        <li>
                            <button class="thumb thumb-3" data-slide-nr="3"><!-- --></button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
export default {
name: "Product"
}
</script>

<style scoped>

</style>
