<template>

<section class="orders-page">

    <!-- HERO -->

    <section class="orders-hero">

        <div class="hero-overlay"></div>

        <div class="container">

            <div class="hero-content">

                <span>
                    CUSTOMER DASHBOARD
                </span>

                <h1>
                    My Orders
                </h1>

                <p>

                    View, track and manage all your orders in one place.

                </p>

                <div class="hero-breadcrumb">

                    <router-link to="/">

                        Home

                    </router-link>

                    <span>/</span>

                    <span>

                        My Orders

                    </span>

                </div>

            </div>

        </div>

    </section>

</section>


<section class="order-stats">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="stat-card">

                    <div class="icon">

                        <i class="fas fa-shopping-bag"></i>

                    </div>

                    <h3>32</h3>

                    <p>Total Orders</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stat-card">

                    <div class="icon">

                        <i class="fas fa-truck"></i>

                    </div>

                    <h3>3</h3>

                    <p>Processing</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stat-card">

                    <div class="icon">

                        <i class="fas fa-check-circle"></i>

                    </div>

                    <h3>27</h3>

                    <p>Delivered</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stat-card">

                    <div class="icon">

                        <i class="fas fa-times-circle"></i>

                    </div>

                    <h3>2</h3>

                    <p>Cancelled</p>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="orders-list">

    <div class="container">

        <div class="order-card">

            <div class="row align-items-center">

                <div class="col-lg-2 col-md-3">

                    <img
                        src="https://picsum.photos/200?random=1"
                        class="product-image"
                    >

                </div>

                <div class="col-lg-4 col-md-9">

                    <span class="order-id">
                        Order #45872
                    </span>

                    <h4>
                        Rolex Submariner
                    </h4>

                    <p class="order-date">

                        Ordered on 26 June 2026

                    </p>

                </div>

                <div class="col-lg-2">

                    <span class="status delivered">

                        Delivered

                    </span>

                </div>

                <div class="col-lg-2">

                    <h5>

                        $1,250

                    </h5>

                    <small>

                        Qty : 1

                    </small>

                </div>

                <div class="col-lg-2 text-lg-end">

                    <button class="order-btn">

                        View Details

                    </button>

                </div>

            </div>

<!------Order Action------->
<div class="order-actions">

    <button class="action-btn">
        <i class="far fa-eye"></i>
        View Details
    </button>

    <button class="action-btn">
        <i class="far fa-file-alt"></i>
        Invoice
    </button>

    <button class="action-btn">
        <i class="fas fa-truck"></i>
        Track Order
    </button>

    <button class="action-btn buy-again">
        <i class="fas fa-redo-alt"></i>
        Buy Again
    </button>

</div>
<!------Order Action------->

        </div>





        <div class="order-card">

            <div class="row align-items-center">

                <div class="col-lg-2 col-md-3">

                    <img
                        src="https://picsum.photos/200?random=2"
                        class="product-image"
                    >

                </div>

                <div class="col-lg-4 col-md-9">

                    <span class="order-id">

                        Order #45873

                    </span>

                    <h4>

                        Apple Watch Ultra

                    </h4>

                    <p class="order-date">

                        Ordered on 24 June 2026

                    </p>

                </div>

                <div class="col-lg-2">

                    <span class="status processing">

                        Processing

                    </span>

                </div>

                <div class="col-lg-2">

                    <h5>

                        $980

                    </h5>

                    <small>

                        Qty : 1

                    </small>

                </div>

                <div class="col-lg-2 text-lg-end">

                    <button class="order-btn">

                        Track Order

                    </button>

                </div>

            </div>

<!------Order Action------->
<div class="order-actions">

    <button class="action-btn">
        <i class="far fa-eye"></i>
        View Details
    </button>

    <button class="action-btn">
        <i class="far fa-file-alt"></i>
        Invoice
    </button>

    <button class="action-btn">
        <i class="fas fa-truck"></i>
        Track Order
    </button>

    <button class="action-btn buy-again">
        <i class="fas fa-redo-alt"></i>
        Buy Again
    </button>

</div>
<!------Order Action------->

        </div>

    </div>

<!----------Order progress--------->

<hr class="order-divider">

<div class="container">
<div class="order-progress">

    <div class="step completed">

        <div class="circle">
            <i class="fas fa-check"></i>
        </div>

        <span>Ordered</span>

    </div>

    <div class="line completed"></div>

    <div class="step completed">

        <div class="circle">
            <i class="fas fa-check"></i>
        </div>

        <span>Confirmed</span>

    </div>

    <div class="line completed"></div>

    <div class="step completed">

        <div class="circle">
            <i class="fas fa-check"></i>
        </div>

        <span>Shipped</span>

    </div>

    <div class="line"></div>

    <div class="step active">

        <div class="circle">

            <i class="fas fa-truck"></i>

        </div>

        <span>Out For Delivery</span>

    </div>

    <div class="line"></div>

    <div class="step">

        <div class="circle">

            <i class="fas fa-home"></i>

        </div>

        <span>Delivered</span>

    </div>

</div>
</div>
<!----------Order progress--------->
</section>

</template>

<script setup>

</script>

<style scoped>

.orders-page{

background:#fff;

}

/* HERO */

.orders-hero{

height:380px;

position:relative;

display:flex;

align-items:center;

justify-content:center;

background:url("https://images.unsplash.com/photo-1556740749-887f6717d7e4?q=80&w=2070&auto=format&fit=crop") center/cover;

overflow:hidden;

}

.hero-overlay{

position:absolute;

inset:0;

background:rgba(0,0,0,.60);

backdrop-filter:blur(2px);

}

.hero-content{

position:relative;

z-index:10;

text-align:center;

color:#fff;

}

.hero-content span{

letter-spacing:4px;

color:#E5CC91;

font-weight:600;

font-size:14px;

}

.hero-content h1{

font-size:60px;

font-weight:700;

margin:20px 0;

}

.hero-content p{

max-width:650px;

margin:auto;

color:#ddd;

font-size:18px;

line-height:32px;

}

.hero-breadcrumb{

margin-top:30px;

}

.hero-breadcrumb a{

color:#E5CC91;

text-decoration:none;

}

.hero-breadcrumb span{

margin:0 8px;

}

@media(max-width:768px){

.hero-content h1{

font-size:38px;

}

.hero-content p{

font-size:15px;

}

}

/*==========================
        ORDER STATS
==========================*/

.order-stats{

    margin-top:-70px;

    position:relative;

    z-index:20;

    padding-bottom:90px;

}

.stat-card{

    background:#fff;

    border-radius:24px;

    padding:35px;

    text-align:center;

    box-shadow:0 20px 45px rgba(0,0,0,.08);

    transition:.35s;

    border:1px solid transparent;

}

.stat-card:hover{

    transform:translateY(-10px);

    border-color:#E5CC91;

    box-shadow:0 30px 60px rgba(0,0,0,.12);

}

.stat-card .icon{

    width:70px;

    height:70px;

    margin:auto;

    border-radius:20px;

    background:#E5CC91;

    display:flex;

    justify-content:center;

    align-items:center;

    transition:.35s;

}

.stat-card:hover .icon{

    background:#111;

}

.stat-card .icon i{

    font-size:26px;

    color:#111;

    transition:.35s;

}

.stat-card:hover .icon i{

    color:#E5CC91;

}

.stat-card h3{

    margin:25px 0 10px;

    font-size:34px;

    font-weight:700;

}

.stat-card p{

    margin:0;

    color:#777;

    font-size:16px;

}

/*=========================
        ORDER CARD
==========================*/

.orders-list{

padding-bottom:100px;

}

.order-card{

background:#fff;

border-radius:24px;

padding:30px;

margin-bottom:30px;

box-shadow:0 20px 45px rgba(0,0,0,.07);

transition:.35s;

border:1px solid transparent;

}

.order-card:hover{

transform:translateY(-8px);

border-color:#E5CC91;

box-shadow:0 35px 60px rgba(0,0,0,.12);

}

.product-image{

width:120px;

height:120px;

border-radius:20px;

object-fit:cover;

}

.order-id{

font-size:14px;

font-weight:600;

color:#999;

letter-spacing:2px;

}

.order-card h4{

margin:12px 0;

font-weight:700;

}

.order-date{

color:#777;

margin:0;

}

.status{

display:inline-block;

padding:10px 22px;

border-radius:50px;

font-size:14px;

font-weight:700;

}

.delivered{

background:#e8fff1;

color:#1d8d4c;

}

.processing{

background:#fff8e5;

color:#d68b00;

}

.order-card h5{

font-size:28px;

font-weight:700;

margin-bottom:8px;

}

.order-btn{

background:#E5CC91;

border:none;

padding:14px 28px;

border-radius:50px;

font-weight:700;

transition:.35s;

}

.order-btn:hover{

background:#111;

color:#E5CC91;

}

/*=========================
      ORDER TIMELINE
==========================*/

.order-divider{

margin:35px 0;

}

.order-progress{

display:flex;

align-items:center;

justify-content:space-between;

flex-wrap:wrap;

}

.step{

display:flex;

flex-direction:column;

align-items:center;

position:relative;

}

.circle{

width:52px;

height:52px;

border-radius:50%;

display:flex;

align-items:center;

justify-content:center;

background:#ececec;

color:#999;

transition:.35s;

font-size:18px;

}

.completed .circle{

background:#E5CC91;

color:#111;

}

.active .circle{

background:#111;

color:#E5CC91;

box-shadow:0 0 25px rgba(229,204,145,.45);

}

.step span{

margin-top:12px;

font-size:13px;

font-weight:600;

color:#666;

text-align:center;

}

.line{

flex:1;

height:3px;

background:#e5e5e5;

margin:0 12px;

margin-bottom:28px;

min-width:40px;

}

.line.completed{

background:#E5CC91;

}

@media(max-width:768px){

.order-progress{

row-gap:30px;

}

.line{

display:none;

}

.step{

width:48%;

}

}

/*==========================
        ORDER ACTIONS
===========================*/

.order-actions{

display:flex;

gap:18px;

margin-top:40px;

flex-wrap:wrap;

}

.action-btn{

height:50px;

padding:0 24px;

border:none;

background:#f8f8f8;

border-radius:50px;

font-weight:600;

transition:.35s;

display:flex;

align-items:center;

gap:10px;

}

.action-btn i{

font-size:15px;

}

.action-btn:hover{

background:#111;

color:#E5CC91;

transform:translateY(-4px);

box-shadow:0 18px 35px rgba(0,0,0,.15);

}

.buy-again{

background:#E5CC91;

color:#111;

}

.buy-again:hover{

background:#111;

color:#E5CC91;

}

</style>