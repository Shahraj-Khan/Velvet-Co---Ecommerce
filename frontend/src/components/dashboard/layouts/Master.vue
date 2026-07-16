<template>
  
<section id="wsus__dashboard">
    <div class="container-fluid">

        <!-- Mobile Menu Button -->
        <div class="dashboard-mobile-toggle d-lg-none">
            <button @click="toggleSidebar">
                <i class="fas fa-bars"></i>
                Menu
            </button>
        </div>

        <SideBar
            :showDashMenu="showDashMenu"
            @toggleSidebar="toggleSidebar"
        />

        <div
    v-if="showDashMenu"
    class="dashboard-overlay"
    @click="toggleSidebar"
></div>

        <Index v-if="$route.path === '/dashboard'" />
        <router-view v-else />

    </div>
</section>
  
  <div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
  </div>
</template>

<script setup>
import { computed, ref } from 'vue';

import Index from '../pages/Index.vue';
import SideBar from './SideBar.vue';

import { useAuthStore } from '@/stores/useAuthStore';

const authStore = useAuthStore();

const showDashMenu = ref(false);

const toggleSidebar = () => {
    showDashMenu.value = !showDashMenu.value;
};

const user = computed(() => authStore.user);
</script>

<style scoped>
.wsusd__dashboard_user{

    text-align:center;

    padding:30px 20px;

    background:#fff;

    border-radius:16px;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.dashboard-avatar{

    width:50px;

    border-radius:50%;

    overflow:hidden;

    border:4px solid #E5CC91;

    margin-bottom:15px;

}

.dashboard-avatar img{

    width:100%;

    height:100%;

    object-fit:cover;

}

.wsusd__dashboard_user{
    display: flex;
    align-items: center;
    gap: 20px;

    padding: 30px 20px;

    background: #fff;

    border-radius: 16px;

    box-shadow: 0 10px 25px rgba(0,0,0,.08);
}

.wsusd__dashboard_user h5{
    margin:0;
    font-size:26px;
    font-weight:700;
}

.wsusd__dashboard_user span{
    display:block;
    margin-top:5px;
    color:#777;
}
.dashboard-user-info{
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.dashboard-user-info h5{
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    line-height: 1.2;
}

.dashboard-user-info span{
    margin-top: 4px;
    color: #777;
    font-size: 15px;
}

.dashboard-mobile-toggle{
    display:none;
    margin:20px 0;
}

.dashboard-mobile-toggle button{
    border:none;
    background:#B8943B;
    color:#fff;
    padding:12px 18px;
    border-radius:10px;
    font-weight:600;
}

.dashboard-mobile-toggle i{
    margin-right:8px;
}

@media(max-width:991px){

    .dashboard-mobile-toggle{
        display:block;
    }

}

.dashboard-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.45);
    z-index:998;
}
</style>