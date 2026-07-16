<template>
  <div class="row">
    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
      <div class="dashboard_content">
        <div class="wsus__dashboard">

          <!-- Dashboard Header -->
<div class="dashboard-header">

    <span class="hero-tag">
        Customer Dashboard
    </span>

    <h2>
        Welcome back, <span>{{ user?.name }}</span>
    </h2>

    <p>
        Manage your orders, wishlist and account settings from one place.
    </p>

</div>

          <!-- Dashboard Cards -->
          <div class="row g-4">

            <div class="col-lg-3 col-md-6">
              <div class="stats-card">
                <div class="stats-icon">
                  <i class="far fa-shopping-bag"></i>
                </div>

                <div>
                  <h3>{{ dashboardStore.stats.total_orders }}</h3>
                  <span>Total Orders</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="stats-card">
                <div class="stats-icon">
                  <i class="far fa-heart"></i>
                </div>

                <div>
                  <h3>0</h3>
                  <span>Wishlist</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="stats-card">
                <div class="stats-icon">
                  <i class="far fa-clock"></i>
                </div>

                <div>
                  <h3>{{ dashboardStore.stats.pending_orders }}</h3>
                  <span>Pending</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="stats-card">
                <div class="stats-icon">
                  <i class="far fa-check-circle"></i>
                </div>

                <div>
                  <h3>{{ dashboardStore.stats.completed_orders }}</h3>
                  <span>Completed</span>
                </div>
              </div>
            </div>

          </div>

          <!-- Recent Orders -->
          <div class="recent-orders">

            <div class="section-title">
              <h4>Recent Orders</h4>

              <router-link to="/user/orders">
                View All
              </router-link>
            </div>

            <table class="table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Product</th>
                  <th>Status</th>
                  <th>Total</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>#VC1025</td>
                  <td>Rolex Submariner</td>
                  <td>
                    <span class="badge completed">
                      Delivered
                    </span>
                  </td>
                  <td>$250</td>
                </tr>

                <tr>
                  <td>#VC1024</td>
                  <td>Omega Speedmaster</td>
                  <td>
                    <span class="badge pending">
                      Pending
                    </span>
                  </td>
                  <td>$430</td>
                </tr>
              </tbody>
            </table>

          </div>

          <!-- Quick Actions -->
          <div class="quick-actions">

            <h4 class="mb-4">
              Quick Actions
            </h4>

            <div class="row g-4">

              <div class="col-lg-3 col-md-6">
                <router-link to="/shop" class="action-card">
                  <i class="far fa-shopping-bag"></i>
                  <h6>Continue Shopping</h6>
                </router-link>
              </div>

              <div class="col-lg-3 col-md-6">
                <router-link to="/user/orders" class="action-card">
                  <i class="far fa-box"></i>
                  <h6>My Orders</h6>
                </router-link>
              </div>

              <div class="col-lg-3 col-md-6">
                <router-link to="/my-profile" class="action-card">
                  <i class="far fa-user-edit"></i>
                  <h6>Edit Profile</h6>
                </router-link>
              </div>

              <div class="col-lg-3 col-md-6">
                <router-link to="/contact" class="action-card">
                  <i class="far fa-headset"></i>
                  <h6>Support</h6>
                </router-link>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>

.dashboard-header{
    justify-content:space-between;
    align-items:center;

    margin-bottom:30px;
}

.dashboard-header h2{
    font-size:32px;
    font-weight:700;
    margin-bottom:6px;
    color:#222;
}

.dashboard-header p{
    color:#777;
    margin:0;
    font-size:15px;
}

.stats-card{

    background:#fff;

    border-radius:18px;

    padding:22px;

    display:flex;

    align-items:center;

    gap:18px;

    box-shadow:0 10px 30px rgba(0,0,0,.06);

    transition:.3s;
}

.stats-card:hover{

    transform:translateY(-6px);

}

.stats-icon{

    width:60px;

    height:60px;

    border-radius:14px;

    background:#E5CC91;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:24px;

    color:#222;
}

.stats-card h3{

    margin:0;

    font-size:28px;

    font-weight:700;
}

.stats-card span{

    color:#777;

    font-size:14px;
}


.recent-orders{

    background:#fff;

    border-radius:20px;

    padding:25px;

    margin-top:35px;

    box-shadow:0 10px 30px rgba(0,0,0,.06);

}

.section-title{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:20px;

}

.section-title h4{

    margin:0;

    font-weight:700;

}

.section-title a{

    color:#267E6C;

    font-weight:600;

    text-decoration:none;

}

.recent-orders table{

    margin:0;

}

.recent-orders th{

    border:none;

    color:#777;

}

.recent-orders td{

    vertical-align:middle;

}

.badge{

    padding:8px 14px;

    border-radius:30px;

    font-weight:600;

}

.completed{

    background:#D4F7E3;

    color:#0F8A43;

}

.pending{

    background:#FFF3CD;

    color:#B78103;

}

.quick-actions{

    margin-top:35px;

}

.action-card{

    background:#fff;

    border-radius:18px;

    padding:30px 20px;

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    text-align:center;

    text-decoration:none;

    color:#222;

    box-shadow:0 10px 30px rgba(0,0,0,.06);

    transition:.3s;

    height:100%;
}

.action-card:hover{

    transform:translateY(-6px);

}

.action-card i{

    width:70px;

    height:70px;

    border-radius:50%;

    background:#E5CC91;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:28px;

    margin-bottom:18px;

}

.action-card h6{

    margin:0;

    font-size:16px;

    font-weight:600;

}

.dashboard-header{
    background:#fff;
    border-radius:22px;
    padding:40px;
    margin-bottom:35px;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
}

.hero-tag{
    display:inline-block;
    padding:8px 18px;
    background:#F8F4EA;
    color:#B8943B;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
    margin-bottom:18px;
}

.dashboard-header h2{
    font-size:44px;
    font-weight:700;
    color:#222;
    margin-bottom:12px;
    line-height:1.2;
}

.dashboard-header h2 span{
    color:#B8943B;
    display:block;
    font-size:32px;
    margin-top:12px;
}

.dashboard-header p{
    margin:0;
    max-width:600px;
    color:#666;
    font-size:16px;
    line-height:1.8;
}

</style>

<script setup>
import { onMounted } from 'vue';
import { useAuthStore } from '@/stores/useAuthStore';
import { useDashboardStore } from '@/stores/useDashboardStore';
import { useOrderListStore } from '@/stores/useOrderListStore';

const authStore = useAuthStore();
const dashboardStore = useDashboardStore();

const user = authStore.user;

onMounted(() => {
    dashboardStore.fetchStats();
});
</script>