<template>

<div class="dashboard_sidebar" :class="{ show_dash_menu: showDashMenu }">

    <span class="close_icon" @click="toggleSidebar">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>

<router-link to="/dashboard" class="dash_logo">

    <img
        src="/assets/images/valvet-co.png"
        alt="Velvet Co"
        class="img-fluid">

    <div class="dash_logo_text">
        <h5>elvet Co</h5>
    </div>

</router-link>


    <ul class="dashboard_link">
      <li>
        <router-link to="/dashboard" active-class="active">
          <i class="fas fa-home"></i> Dashboard
        </router-link>
      </li>
      <li>
        <router-link to="/user/orders" active-class="active">
          <i class="fas fa-shopping-bag"></i> Orders
        </router-link>
      </li>
      <li>
        <router-link to="/my-profile" active-class="active">
          <i class="far fa-user-circle"></i> My Profile
        </router-link>
      </li>
         <li>
        <router-link to="/" active-class="active">
          <i class="far fa-arrow-left"></i>Back Home 
        </router-link>
      </li>
      <li>
        <a href="#" @click.prevent="logout">
          <i class="far fa-sign-out-alt"></i> Log out
        </a>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { useAuthStore } from '@/stores/useAuthStore';
import { useRouter } from 'vue-router';

const props = defineProps({
    showDashMenu: Boolean
});

const emit = defineEmits(["toggleSidebar"]);

const toggleSidebar = () => {
    emit("toggleSidebar");
};

const authStore = useAuthStore();
const router = useRouter();

const logout = async () => {
    await authStore.logout();
    router.push('/login');
};
</script>