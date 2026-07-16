<template>
    <!--==========================
        PRODUCT MODAL VIEW START
      ===========================-->
    <ProductModal></ProductModal>
    <!--==========================
        PRODUCT MODAL VIEW END
      ===========================-->

    <!--============================
         MONTHLY TOP PRODUCT START
      ==============================-->
    <!--============================
        BANNER PART 2 START
    ==============================-->
    <section id="wsus__banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__banner_content">
                        <div class="row banner_slider">
                            <div class="col-xl-12">
<div
  class="wsus__single_slider"
  :style="{ backgroundImage: `url(${slider1})` }"
>
                                    <div class="wsus__single_slider_text">
                                        <h3>new arrivals</h3>
                                        <h1>men's fashion</h1>
                                        <h6>start at $99.00</h6>
                                        <a class="common_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div
  class="wsus__single_slider"
  :style="{ backgroundImage: `url(${slider2})` }"
>
                                    <div class="wsus__single_slider_text">
                                        <h3>new arrivals</h3>
                                        <h1>kid's fashion</h1>
                                        <h6>start at $49.00</h6>
                                        <a class="common_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div
  class="wsus__single_slider"
  :style="{ backgroundImage: `url(${slider3})` }"
>
                                    <div class="wsus__single_slider_text">
                                        <h3>new arrivals</h3>
                                        <h1>winter collection</h1>
                                        <h6>start at $99</h6>
                                        <a class="common_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BANNER PART 2 END
    ==============================-->


    <!--============================
        FLASH SELL START
    ==============================-->
    <!-- <section id="wsus__flash_sell" class="wsus__flash_sell_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="offer_time" style="background: url(images/flash_sell_bg.jpg)">
                        <div class="wsus__flash_coundown">
                            <span class=" end_text">flash sell</span>
                            <div class="simply-countdown simply-countdown-one"></div>
                            <a class="common_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flash_sell_slider">
                <div class="col-xl-3 col-sm-6 col-lg-4 ">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="/assets/images/pro3.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="/assets/images/pro3_3.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a> </li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">Electronics </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(133 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">hp 24" FHD monitore</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="/assets/images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="/assets/images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a> </li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(17 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="/assets/images/pro9.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="/assets/images/pro9_9.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a> </li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(120 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's fashion sholder bag</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="/assets/images/pro2.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="/assets/images/pro2_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a> </li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(72 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual shoes</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="/assets/images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="/assets/images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a> </li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(17 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> -->
    <!--============================
        FLASH SELL END
    ==============================-->


    <section id="wsus__monthly_top" class="wsus__monthly_top_2">
        <div class="container">
            <!-- <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="wsus__monthly_top_banner">
              <div class="wsus__monthly_top_banner_img">
                <img
                  src="/assets/images/monthly_top_img3.jpg"
                  alt="img"
                  class="img-fluid w-100"
                />
                <span></span>
              </div>
              <div class="wsus__monthly_top_banner_text">
                <h4>Black Friday Sale</h4>
                <h3>Up To <span>70% Off</span></h3>
                <h6>Everything</h6>
                <a class="shop_btn" href="#">shop now</a>
              </div>
            </div>
          </div>
        </div> -->


            <!-- products list items -->
            <div class="row">
                <Spinner :store="productsStore"></Spinner>

                <ProductListTop></ProductListTop>
            </div>
            <!-- products list -->
        </div>

    </section>
    <section id="wsus__monthly_top" class="wsus__monthly_top_2">
        <div class="container">



            <!-- products list items -->
            <div class="row">
                <Spinner :store="productsStore"></Spinner>

                <ProductList></ProductList>
            </div>
            <!-- products list -->
        </div>

    </section>
    <!--============================
         MONTHLY TOP PRODUCT END
      ==============================-->

    <!--============================
        BRAND SLIDER START
    ==============================-->
<section id="wsus__brand_sleder" class="brand_slider_2">

    <div class="container">

        <div class="brand-heading">

            <span>Luxury Brands</span>

            <h2>
                Trusted Partners
            </h2>

            <p>
                Explore premium brands trusted by thousands of customers worldwide.
            </p>

        </div>
            
            <div class="brand-wrapper">
                <div class="row brand_slider">
                    <div class="col-xl-2">
                        <div class="brand-card">
                            <img src="/assets/images/brand_logo_1.jpg" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="brand-card">
                            <img src="/assets/images/brand_logo_2.jpg" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="brand-card">
                            <img src="/assets/images/brand_logo_3.jpg" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="brand-card">
                            <img src="/assets/images/brand_logo_4.jpg" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="brand-card">
                            <img src="/assets/images/brand_logo_5.jpg" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="brand-card">
                            <img src="/assets/images/brand_logo_6.jpg" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="brand-card">
                            <img src="/assets/images/brand_logo_3.jpg" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BRAND SLIDER END
    ==============================-->
</template>
<script setup>
import ProductListTop  from './products/ProductListTop.vue';
import ProductModal from './products/ProductModal.vue';
import { useProductsStore } from '@/stores/useProductsStore';
import Spinner from './layouts/Spinner.vue';
import slider1 from '@/assets/images/slider_1.jpg';
import slider2 from '@/assets/images/slider_2.jpg';
import slider3 from '@/assets/images/slider_3.jpg';
const productsStore = useProductsStore();

import { onMounted } from 'vue';
import ProductList from './products/ProductList.vue';
onMounted(() => {
    productsStore.fetchAllProducts();
});

onMounted(() => {
    productsStore.fetchAllProducts();

    if (typeof $ === "undefined") return;

    // Destroy old slick if exists
    if ($('.brand_slider').hasClass('slick-initialized')) {
        $('.brand_slider').slick('unslick');
    }

    // ==========================
    // Brand Slider
    // ==========================
    $('.brand_slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,

        infinite: true,

        autoplay: true,
        autoplaySpeed: 0,
        speed: 5000,
        cssEase: 'linear',

        arrows: false,
        dots: false,

        pauseOnHover: false,
        pauseOnFocus: false,

        swipe: false,
        draggable: false,
        touchMove: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });

    // ==========================
    // Banner Slider
    // ==========================
    $('.banner_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        arrows: false,
    });

    // ==========================
    // Countdown
    // ==========================
    const d = new Date();
    d.setDate(d.getDate() + 90);

    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: true
    });

    // ==========================
    // Flash Sell Slider
    // ==========================
    $('.flash_sell_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        nextArrow: '<i class="fas fa-chevron-right nxt_arr"></i>',
        prevArrow: '<i class="fas fa-chevron-left prv_arr"></i>',

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });

});
</script>

<style scoped>

.brand-heading{
    text-align:center;
    margin-bottom:55px;
}

.brand-heading span{
    display:inline-block;
    padding:8px 18px;
    background:#F8F4EA;
    color:#B8943B;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
    letter-spacing:.5px;
}

.brand-heading h2{
    margin:18px 0 12px;
    font-size:42px;
    font-weight:700;
    color:#222;
}

.brand-heading p{
    max-width:620px;
    margin:auto;
    color:#777;
    line-height:1.8;
    font-size:16px;
}

.brand-wrapper{
    background:#fff;
    border-radius:24px;
    padding:35px;
    box-shadow:0 15px 40px rgba(0,0,0,.05);
}

.brand-card{
    background:#fff;
    height:140px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:18px;

    border:1px solid #F1F1F1;

    transition:.35s;

    margin:12px;
}

.brand-card img{

    max-width:120px;

    max-height:70px;

    width:auto;

    height:auto;

    object-fit:contain;

    transition:.35s;
}

.brand-card:hover{

    transform:translateY(-8px);

    border-color:#E5CC91;

    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.brand-card:hover img{

    transform:scale(1.08);
}

#wsus__brand_sleder{
    padding:50px 0;
    background:#FCFCFC;
}

.brand_slider .slick-track{
    display:flex;
    align-items:center;
}

.brand_slider .slick-slide{
    height:inherit;
}

.nxt_arr,
.prv_arr{

    width:48px;
    height:48px;

    border-radius:50%;

    background:#fff;

    color:#222;

    display:flex;
    align-items:center;
    justify-content:center;

    box-shadow:0 8px 25px rgba(0,0,0,.08);

    transition:.3s;

    z-index:10;
}

.nxt_arr:hover,
.prv_arr:hover{

    background:#B8943B;

    color:#fff;

    transform:scale(1.08);

}

.prv_arr{

    left:-25px;

}

.nxt_arr{

    right:-25px;

}

.brand_slider{

    margin-top:10px;

}

.brand-card{

    margin:15px;

}

@media(max-width:991px){

    .brand-heading h2{

        font-size:34px;

    }

    .brand-wrapper{

        padding:25px;

    }

}

@media(max-width:576px){

    #wsus__brand_sleder{

        padding:70px 0;

    }

    .brand-heading h2{

        font-size:28px;

    }

    .brand-heading p{

        font-size:14px;

    }

    .brand-card{

        height:110px;

    }

    .brand-card img{

        max-width:90px;

    }

}

</style>