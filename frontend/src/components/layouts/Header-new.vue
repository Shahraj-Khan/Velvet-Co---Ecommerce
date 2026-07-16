<template>

<header class="header-new">

<!--============================
    TOP HEADER START
=============================-->
<div class="top-header">
    <div class="container">
        <div class="top-header-wrapper">
            <div class="top-left">
                <a href="#">USD <i class="far fa-angle-down"></i></a>
                <a href="#">ENG <i class="far fa-angle-down"></i></a>
            </div>

            <div class="top-right">

                <a href="tel:">
                    <i class="far fa-phone-alt"></i>
                    +880 1700-000000
                </a>

                <router-link to="/">
                    <i class="far fa-heart"></i>
                    Wishlist
                </router-link>

                <router-link to="/about">
                    About Us
                </router-link>

                <router-link to="/contact">
                    Contact
                </router-link>

                <template v-if="!authStore.isLoggedIn">
                    <router-link to="/login">
                        <i class="far fa-user"></i>
                        Login
                    </router-link>
                </template>

                <template v-else>
                    <router-link to="/my-profile">
                        <i class="far fa-user"></i>
                        {{ authStore.user?.name }}
                    </router-link>
                </template>

            </div>

        </div>
    </div>
</div>

<!--============================
    TOP HEADER END
=============================-->    
    
<div class="header-middle">

    <div class="container">

        <div class="header-middle-wrapper">
<div class="mobile-menu-btn d-lg-none">
    <span
    class="wsus__mobile_menu_icon"
    @click="showMobileMenu = true">
    <i class="fal fa-bars"></i>
</span>
</div>
            <!-- Logo -->
            <div class="header-logo">

                   <router-link to="/" class="logo">

      <img :src="logo" alt="logo" class="img-fluid">
    </router-link>
            </div>

            <!-- Search -->

            <div class="header-search ">
    <form class="search-box" @submit.prevent="searchProducts">
        <input
            v-model="searchTerm"
            type="text"
            placeholder="Search for products..."
        />

        <button type="submit">
            <i class="far fa-search"></i>
        </button>
    </form>
</div>
            <!-- Icons -->

<div class="header-icons">

    <!-- Wishlist -->
    <router-link to="/" class="header-icon d-none d-lg-flex">
        <i class="fal fa-heart"></i>
        <span class="count">0</span>
    </router-link>

    <!-- Compare -->
    <router-link to="/" class="header-icon d-none d-lg-flex">
        <i class="fal fa-random"></i>
        <span class="count">0</span>
    </router-link>

    <!-- Cart -->
    <a
    href="#"
    class="header-icon cart-btn"
    @click.prevent="showMiniCart = true"
>
        <i class="fal fa-shopping-bag"></i>

        <span class="count">
            {{ cartStore.cartItems.length }}
        </span>
    </a>
</div>

        </div>
<!----------Cart Start here-------------->

<div
    v-if="showMiniCart"
    class="mini-cart-overlay"
    @click="showMiniCart = false">
</div>

        <div
    class="wsus__mini_cart"
    :class="{ show_cart: showMiniCart }">
            <h4>shopping cart <span
    class="wsus_close_mini_cart"
    @click="showMiniCart = false"><i class="far fa-times"></i></span></h4>
            <ul>
                <li v-for="(product, index) in cartStore.cartItems" :key="product.ref">
                    <div class="wsus__cart_img">
                        <a href="#"><img :src="product.image" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">{{ product.name }}</a>
                        <p>${{ product.price }} <del>$150</del></p>
                    </div>
                </li>

            </ul>
            <h5>sub total <span>${{ total }}</span></h5>
            <div class="wsus__minicart_btn_area">
                <router-link class="common_btn" to="/cart">view cart</router-link>
                <router-link class="common_btn" to="/checkout">Checkout</router-link>

            </div>
        </div>

<!----------Cart Start End-------------->

    </div>

</div>

<!-- Mobile Search -->
<div class="mobile-search d-lg-none">
    <div class="container">
        <form class="search-box" @submit.prevent="searchProducts">
            <input
                v-model="searchTerm"
                type="text"
                placeholder="Search for products..."
            />

            <button type="submit">
                <i class="far fa-search"></i>
            </button>
        </form>
    </div>
</div>
</header>


    <!--============================
        MOBILE MENU START
    ==============================-->
<div
    v-if="showMobileMenu"
    class="mobile-menu-overlay"
    @click="showMobileMenu = false">
</div>
<section
    id="wsus__mobile_menu"
    :class="{ show_m_menu: showMobileMenu }">

<div class="mobile-menu-header">

    <h4 class="mobile-menu-logo">
        Velvet Co
    </h4>

    <button
        class="mobile-close-btn"
        @click="showMobileMenu = false">

        <i class="fal fa-times"></i>

    </button>

</div>

<div class="mobile-menu-body">

<div class="mobile-user-card">

    <div class="mobile-user-avatar">
        <i class="far fa-user"></i>
    </div>

    <div class="mobile-user-info">

        <h6>
            {{ authStore.isLoggedIn ? authStore.user?.name : 'Guest User' }}
        </h6>

        <p>
            {{ authStore.isLoggedIn ? 'Welcome Back!' : 'Sign in to your account' }}
        </p>

    </div>

</div>

        <ul class="mobile-menu-list">

            <li>
    <router-link to="/">
        <i class="far fa-home"></i>
        <span>Home</span>
    </router-link>
</li>

<li>
    <router-link to="/shop">
        <i class="far fa-store"></i>
        <span>Shop</span>
    </router-link>
</li>

<li>
    <router-link to="/track-order">
        <i class="far fa-box"></i>
        <span>Track Order</span>
    </router-link>
</li>

<li>
    <router-link to="/contact">
        <i class="far fa-envelope"></i>
        <span>Contact</span>
    </router-link>
</li>
<!---------Menu End--------->

<template v-if="authStore.isLoggedIn">

    <li>
        <router-link to="/dashboard">
            <i class="far fa-user"></i>
            <span>My Account</span>
        </router-link>
    </li>

    <li>
        <router-link to="/user/orders">
            <i class="far fa-shopping-bag"></i>
            <span>My Orders</span>
        </router-link>
    </li>

    <li>
        <button class="mobile-logout-btn" @click="handleLogout">
            <i class="far fa-sign-out-alt"></i>
            <span>Logout</span>
        </button>
    </li>

</template>

<template v-else>

    <li>
        <router-link to="/login">
            <i class="far fa-sign-in-alt"></i>
            <span>Login</span>
        </router-link>
    </li>

</template>

<template v-else>

    <li>
        <router-link to="/login">
            <i class="far fa-sign-in-alt"></i>
            <span>Login</span>
        </router-link>
    </li>

</template>

        </ul>

    </div>

</section>
    <!--============================
        MOBILE MENU END
    ==============================-->
</template>
<style scoped>
.top-header{
    height:42px;
    border-bottom:1px solid #ececec;
    background:#fff;
}

.top-header-wrapper{
    height:42px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.top-left,
.top-right{
    display:flex;
    align-items:center;
    gap:22px;
}

.top-left a,
.top-right a{
    font-size:13px;
    color:#666;
    text-decoration:none;
    transition:.3s;
}

.top-right a:hover,
.top-left a:hover{
    color:#E5CC91;
}

.top-right i{
    margin-right:6px;
}
.header-middle{
    background:#fff;
    padding:20px 0;
    border-bottom:1px solid #ececec;
    width: 100%;
}

.header-middle .container {
    width: 100%;
    max-width: 100%;
    padding: 0 15px;
}

.header-middle-wrapper{

    display:flex;

    align-items:center;

    justify-content:space-between;

    position: relative;

    width: 100%;

}

.header-logo{

    width:70px;


}

.header-search{

    flex:1;

    margin:0 50px;

}

.header-icons{

    width:220px;

    display:flex;

    justify-content:flex-end;

}
.logo{

    display:flex;

    align-items:center;

}

.logo img{

    width:210px;
    height:auto;
    object-fit:contain;

    transition:.35s;

}

.logo img:hover{

    opacity:.9;

}
.header-new{
    width:100%;
    max-width:100%;
    min-width:100%;
    display:block;
    background:#fff;
}
.header-search :deep(form){
    width:60%;
    margin:auto;
}

.header-search :deep(.form-control),
.header-search :deep(input){
    height:52px;
    border-radius:50px;
    border:1px solid #e5e5e5;
    padding:0 20px;
    box-shadow:none;
}

.header-search :deep(input:focus){
    border-color:#E5CC91;
}
.header-icons{

    display:flex;

    align-items:center;

    justify-content:flex-end;

    gap:28px;

}

.header-icon{

    position:relative;

    color:#222;

    font-size:24px;

    transition:.3s;

}

.header-icon:hover{

    color:#E5CC91;

}

.count{

    position:absolute;

    top:-8px;

    right:-10px;

    width:20px;

    height:20px;

    border-radius:50%;

    background:#E5CC91;

    color:#111;

    font-size:11px;

    font-weight:700;

    display:flex;

    align-items:center;

    justify-content:center;

}
.search-box{
    display:flex;
    align-items:center;
    width:100%;
    border:1px solid #e5e5e5;
    border-radius:50px;
    overflow:hidden;
    height:54px;
}

.search-box input{
    flex:1;
    border:none;
    padding:0 22px;
    outline:none;
    font-size:15px;
}

.search-box button{
    width:70px;
    height:54px;
    border:none;
    background:#E5CC91;
    transition:.3s;
}

.search-box button:hover{
    background:#d8bb77;
}
.mobile-menu-btn{
    font-size:24px;
    cursor:pointer;
    margin-right:15px;
    display:flex;
    align-items:center;
}
.mobile-menu-overlay{
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.35);
    z-index: 9998;
}

#wsus__mobile_menu{
    z-index: 9999;
}


.mobile-menu-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px;
    border-bottom:1px solid rgba(255,255,255,.15);
}

.mobile-menu-logo{
    color:#fff;
    font-size:24px;
    font-weight:700;
    margin:0;
    letter-spacing:1px;
}

.mobile-close-btn{
    width:42px;
    height:42px;
    border:none;
    border-radius:50%;
    background:rgba(255,255,255,.12);
    color:#fff;
    font-size:18px;
    transition:.3s;
}

.mobile-close-btn:hover{
    background:#E5CC91;
    color:#111;
}

.mobile-menu-body{
    padding:20px;
}
.mobile-user-card{
    display:flex;
    align-items:center;
    gap:15px;
    padding:18px;
    margin-bottom:25px;
    background:rgba(255,255,255,.08);
    border-radius:12px;
}

.mobile-user-avatar{
    width:55px;
    height:55px;
    border-radius:50%;
    background:#E5CC91;
    color:#111;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
}

.mobile-user-info h6{
    margin:0;
    color:#fff;
    font-size:16px;
    font-weight:600;
}

.mobile-user-info p{
    margin:4px 0 0;
    color:rgba(255,255,255,.75);
    font-size:13px;
}
.mobile-menu-list{
    list-style:none;
    margin:0;
    padding:0;
}
.mobile-menu-list{
    list-style:none;
    margin:0;
    padding:0;
}

.mobile-menu-list li{
    margin-bottom:8px;
}

.mobile-menu-list li a,
.mobile-logout-btn{
    width:100%;
    display:flex;
    align-items:center;
    gap:14px;
    padding:14px 18px;
    border-radius:10px;
    text-decoration:none;
    color:#fff !important;
    background:transparent;
    border:none;
    transition:.3s;
    font-size:15px;
    font-weight:500;
}

.mobile-menu-list li i{
    width:22px;
    color:#E5CC91;
    font-size:18px;
    text-align:center;
}

.mobile-menu-list li a:hover,
.mobile-logout-btn:hover{
    background:rgba(255,255,255,.08);
    transform:translateX(6px);
}

.mobile-menu-list .router-link-active{
    background:#E5CC91;
    color:#111 !important;
}

.mobile-menu-list .router-link-active i{
    color:#111;
}


.mini-cart-overlay{
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.4);
    z-index: 9998;
}

.wsus__mini_cart{
    z-index: 9999;
}
</style>



<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { useCartStore } from '@/stores/useCartStore';
import { useAuthStore } from '@/stores/useAuthStore';
import SearchForm from '../shop/filter/SearchForm.vue';
import logo from '@/assets/images/valvet-co.png';
const showMobileMenu = ref(false);
// Router
const router = useRouter();

// Stores
const cartStore = useCartStore();
const authStore = useAuthStore();

// Reactive State
const searchTerm = ref('');
const showMiniCart = ref(false);

// Computed
const total = computed(() =>
    cartStore.cartItems.reduce(
        (acc, item) => acc + item.price * item.quantity,
        0
    )
);

// Search
const searchProducts = () => {
    const query = { ...router.currentRoute.value.query };

    if (searchTerm.value.trim()) {
        query.search = searchTerm.value.trim();

        delete query.categories;
        delete query.brands;
        delete query.colors;
        delete query.sizes;
        delete query.min_price;
        delete query.max_price;
    } else {
        delete query.search;
    }

    router.push({
        path: '/shop',
        query
    });
};

// Logout
const handleLogout = async () => {
    const success = await authStore.logout();

    if (success) {
        router.push('/login');
    }
};

// Load User
onMounted(() => {
    if (authStore.accessToken) {
        authStore.fetchCurrentUser();
    }
});

// Mobile Menu
onMounted(() => {
    if (typeof $ !== 'undefined') {

    }
});
</script>