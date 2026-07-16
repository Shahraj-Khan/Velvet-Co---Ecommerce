<template>
    <section class="coming-soon-page">

        <div class="container">

            <div class="coming-content">

                <span class="badge-text">
                    EXCLUSIVE COLLECTION
                </span>

                <h1>
                    Daily Deals
                </h1>

                <p>
                    We're preparing something special for you. Discover exclusive
                    limited-time offers, premium discounts, and handpicked products
                    updated every day.
                </p>

                <div class="coming-buttons">

                    <router-link to="/shop" class="btn-shop">
                        Explore Shop
                    </router-link>

                    <router-link to="/" class="btn-home">
                        Back Home
                    </router-link>

                </div>

                <div class="coming-box">

                    <h3>Coming Soon</h3>

                    <span>Launching Very Soon</span>

                </div>

            </div>

        </div>

    </section>
</template>

<script setup>

</script>

<style scoped>

.coming-soon-page{

min-height:85vh;

display:flex;

align-items:center;

justify-content:center;

background:#fff;

padding:100px 0;

}

.coming-content{

text-align:center;

max-width:800px;

margin:auto;

}

.badge-text{

display:inline-block;

padding:10px 22px;

background:rgba(229,204,145,.18);

color:#B38B2D;

border-radius:50px;

font-size:13px;

font-weight:700;

letter-spacing:2px;

margin-bottom:25px;

}

.coming-content h1{

font-size:70px;

font-weight:700;

margin-bottom:25px;

color:#111;

}

.coming-content p{

font-size:18px;

line-height:34px;

color:#777;

max-width:650px;

margin:auto;

}

.coming-buttons{

display:flex;

justify-content:center;

gap:20px;

margin-top:45px;

flex-wrap:wrap;

}

.btn-shop{

padding:15px 38px;

background:#E5CC91;

color:#111;

border-radius:50px;

text-decoration:none;

font-weight:700;

transition:.35s;

}

.btn-shop:hover{

background:#111;

color:#E5CC91;

}

.btn-home{

padding:15px 38px;

border:2px solid #E5CC91;

color:#111;

border-radius:50px;

text-decoration:none;

font-weight:700;

transition:.35s;

}

.btn-home:hover{

background:#E5CC91;

color:#111;

}

.coming-box{

margin-top:70px;

padding:35px;

border-radius:22px;

border:1px solid #eee;

background:#fafafa;

}

.coming-box h3{

font-size:36px;

font-weight:700;

margin-bottom:10px;

color:#111;

}

.coming-box span{

color:#999;

font-size:16px;

letter-spacing:1px;

}

@media(max-width:768px){

.coming-content h1{

font-size:44px;

}

.coming-content p{

font-size:16px;

line-height:30px;

}

}

</style>