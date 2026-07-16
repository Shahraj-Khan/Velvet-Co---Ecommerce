<template>
<AppLoader :loading="loading" />
    <!-- Layout mặc định (có header/footer) -->
    <div v-if="$route.meta.layout !== 'dashboard'">
<!-------
      <Header />
      <Navbar />
------>
    <HeaderNew />
    <NavbarNew />
      <router-view />
      <Footer />
          <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->
    </div>
    
    <!-- Layout dashboard (không header/footer) -->
    <div v-else>
      <router-view />
          <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->
    </div>
  </template>
  
  <script setup>
import { ref, onMounted } from "vue";

import HeaderNew from "@/components/layouts/Header-new.vue";
import NavbarNew from "@/components/layouts/Navbar-new.vue";

import Header from "@/components/layouts/Header.vue";
import Navbar from "@/components/layouts/Navbar.vue";
import Footer from "@/components/layouts/Footer.vue";
import AppLoader from "@/components/common/AppLoader.vue";

const loading = ref(true);

onMounted(() => {

    setTimeout(()=>{

        loading.value=false;

    },2500);

})
  </script>