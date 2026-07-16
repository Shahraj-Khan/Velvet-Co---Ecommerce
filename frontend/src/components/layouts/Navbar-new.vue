<template>
    <nav class="main-navbar">

        <div class="container">

            <ul class="nav-menu">

                <li>
                    <router-link to="/">
                        Home
                    </router-link>
                </li>

                <li>

                    <router-link to="/shop">
                        Shop
                    </router-link>
                </li>

                <li>

                    <router-link to="/daily-deals">

                        Daily Deals

                    </router-link>

                </li>

                <li>

                    <router-link to="/track-order">

                        Track Order

                    </router-link>

                </li>

                <li>

                    <router-link to="/contact">

                        Contact

                    </router-link>

                </li>

            </ul>

        </div>

    </nav>
</template>

<script setup>

import { onMounted } from 'vue'
import { useAuthStore } from '@/stores/useAuthStore'
import { useRouter } from 'vue-router';
  
  const authStore = useAuthStore()
  const router = useRouter();
  // Đăng xuất
  const handleLogout = async () => {
  const success = await authStore.logout();
  if (success) {
    router.push('/login');
  }
};
  
  // Khi component mounted, kiểm tra user nếu đã có token
  onMounted(() => {
    if (authStore.accessToken) {
      authStore.fetchCurrentUser()
    }
  })


</script>

<style scoped>
.main-navbar{

    height:65px;

    background:#fff;

    border-top:1px solid #eee;

    border-bottom:1px solid #eee;

}

.nav-menu{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:45px;

    height:60px;

    list-style:none;

    margin:0;

    padding:0;

}

.nav-menu li{

    position:relative;

}

.nav-menu a{

    color:#222;

    text-decoration:none;

    font-weight:600;

    font-size:15px;

    transition:.3s;

}

.nav-menu a:hover{

    color:#E5CC91;

}

.nav-menu i{

    margin-left:5px;

    font-size:12px;

}
</style>