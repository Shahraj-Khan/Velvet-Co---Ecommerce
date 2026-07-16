<script setup lang="ts">
import SideBar from '../../layouts/SideBar.vue';
import { useOrderListStore } from '@/stores/useOrderListStore';
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const orderStore = useOrderListStore();
const currentPage = ref(1);

const formatDate = (dateString) => {
  const date = new Date(dateString);
  return date.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric'
  });
};

const formatPrice = (price) => {
  return new Intl.NumberFormat('en-bd', {
    style: 'currency',
    currency: 'BDT'
  }).format(price);
};

onMounted(async () => {
    await orderStore.fetchOrders();
});

const changePage = async (page) => {
    if (page < 1 || page > orderStore.pagination.last_page) return;
    currentPage.value = page;
    await orderStore.fetchOrders(page);
};
</script>

<template>
    <SideBar />
    
    <div class="row">
  <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
<div class="dashboard_content">

    <div class="premium-header mb-4">
        <div class="row align-items-center">

            <div class="col-md-8">
                <span class="dashboard-label">
                    <i class="fas fa-shopping-bag me-2"></i>
                    Dashboard
                </span>

                <h2 class="dashboard-title mt-2">
                    My Orders
                </h2>

                <p class="dashboard-subtitle mb-0">
                    View, manage and track all of your recent purchases in one place.
                </p>
            </div>

            <div class="col-md-4 text-md-end mt-3 mt-md-0">

                <div class="order-counter">

                    <div class="counter-number">
                        {{ orderStore.orders.length }}
                    </div>

                    <small>Total Orders</small>

                </div>

            </div>

        </div>
    </div>

    <!-- Loading -->
    <div v-if="orderStore.loading" class="text-center py-5">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        <p class="mt-3 mb-0">Loading orders...</p>
    </div>

    <!-- Error -->
    <div v-else-if="orderStore.error" class="alert alert-danger">
        {{ orderStore.error }}
    </div>

    <!-- Orders -->

<div v-else class="wsus__dashboard_order premium-table-card">
        <div class="table-responsive">
          <table class="table premium-table align-middle">
<thead>
    <tr>
        <th>Order</th>
        <th>Date</th>
        <th>Expires</th>
        <th>Total</th>
        <th>Payment</th>
        <th>Transaction</th>
        <th>Status</th>
        <th class="text-center">Action</th>
    </tr>
</thead>
            <tbody>
              <tr v-for="order in orderStore.orders" :key="order.id">
<td>
    <div class="order-id">
        #{{ order.order_code }}
    </div>
</td>
               <td>
    <span class="text-muted">
        {{ formatDate(order.created_at) }}
    </span>
</td>
<td>
    <span class="text-muted">
        {{ formatDate(order.expired_at) }}
    </span>
</td>
                <td>
    <span class="price-text">
        {{ formatPrice(order.total) }}
    </span>
</td>

<td>
    <span
        class="payment-badge"
        :class="{
            'payment-cod': order.payment_method === 'cod',
            'payment-momo': order.payment_method === 'momo'
        }"
    >
        {{ order.payment_method === 'cod' ? 'Cash On Delivery' : 'Momo' }}
    </span>
</td>
                <!-- <td class="tr_id">
  <div v-for="transaction in order.transactions" :key="transaction.id">
    {{ transaction.transaction_code }}
  </div>
</td> -->

<td>
<span
    v-if="order.transactions && order.transactions.length"
    class="transaction-chip"
>
    {{ order.transactions[0].transaction_code }}
</span>

<span
    v-else
    class="text-muted"
>
    —
</span>
</td>


<td>
    <span
        class="status-pill"
        :class="{
            'status-pending': order.status === 'pending',
            'status-processing': order.status === 'processing',
            'status-completed': order.status === 'completed',
            'status-cancelled': order.status === 'cancelled'
        }"
    >
        {{ order.status }}
    </span>
</td>
                <td class="status">
                  <router-link 
                    :to="{ name: 'order-invoice', params: { id: order.id } }" 
                    class="btn premium-btn">
                    View
                  </router-link>
                </td>
              </tr>
              
              <tr v-if="orderStore.orders.length === 0">
                <td colspan="7" class="text-center py-4">
                  <div class="py-4">
    <i class="fas fa-box-open fa-3x text-secondary mb-3"></i>

    <h5>No Orders Found</h5>

    <p class="text-muted mb-0">
        You haven't placed any orders yet.
    </p>
</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div id="pagination" v-if="orderStore.pagination.last_page > 1">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item" :class="{ disabled: currentPage === 1 }">
                <a class="page-link" href="#" aria-label="Previous" @click.prevent="changePage(currentPage - 1)">
                  <i class="fas fa-chevron-left"></i>
                </a>
              </li>

              <li v-for="page in orderStore.pagination.last_page" 
                  :key="page"
                  class="page-item" 
                  :class="{ active: currentPage === page }">
                <a class="page-link" href="#" @click.prevent="changePage(page)">
                  {{ page }}
                </a>
              </li>

              <li class="page-item" :class="{ disabled: currentPage === orderStore.pagination.last_page }">
                <a class="page-link" href="#" aria-label="Next" @click.prevent="changePage(currentPage + 1)">
                  <i class="fas fa-chevron-right"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

</template>
<style scope>
.premium-header{
    background:#fff;
    border-radius:20px;
    padding:30px;
    box-shadow:0 12px 35px rgba(0,0,0,.06);
}

.dashboard-label{
    display:inline-flex;
    align-items:center;
    padding:8px 18px;
    border-radius:50px;
    background:#eef5ff;
    color:#0d6efd;
    font-weight:600;
    font-size:14px;
}

.dashboard-title{
    font-size:34px;
    font-weight:700;
    margin-bottom:10px;
}

.dashboard-subtitle{
    color:#6c757d;
    font-size:15px;
}

.order-counter{
    background:linear-gradient(135deg,#0d6efd,#4f8dfd);
    color:white;
    border-radius:18px;
    padding:20px;
    text-align:center;
}

.counter-number{
    font-size:32px;
    font-weight:700;
}

/* ===========================
   Premium Order Card
=========================== */

.premium-table-card{
    background:#ffffff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 15px 40px rgba(0,0,0,.06);
    overflow:hidden;
}


/* ===========================
   Table
=========================== */

.premium-table{
    width:100%;
    table-layout:auto; 
    border-collapse:separate;
    border-spacing:0;
}

.premium-table thead th{
    background:#f8fafc !important;
    color:#1e293b !important;
    font-size:15px;
    font-weight:700;
    text-transform:none;
    padding:18px 20px;
    border:none !important;
    white-space:nowrap;
    vertical-align:middle;
}

.premium-table tbody td{
    padding:18px 16px;
    vertical-align:middle;
    border-color:#eef2f7;
}

.premium-table tbody tr{
    transition:all .25s ease;
}

.premium-table tbody tr:hover{
    background:#f8fbff;
}


/* ===========================
   Order ID
=========================== */

.order-id{
    display:inline-block;
    padding:8px 16px;
    border-radius:30px;
    background:#eef5ff;
    color:#2563eb;
    font-weight:700;
    font-size:14px;
}


/* ===========================
   Price
=========================== */

.price-text{
    font-size:16px;
    font-weight:700;
    color:#16a34a;
}


/* ===========================
   Payment Badge
=========================== */

.payment-badge{
    display:inline-block;
    padding:8px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

.payment-cod{
    background:#dbeafe;
    color:#2563eb;
}

.payment-momo{
    background:#dcfce7;
    color:#15803d;
}


/* ===========================
   Transaction
=========================== */

.transaction-chip{
    display:inline-block;
    padding:7px 14px;
    border-radius:30px;
    background:#f3f4f6;
    font-family:monospace;
    font-size:13px;
    color:#374151;
}


/* ===========================
   Status
=========================== */

.status-pill{
    display:inline-block;
    padding:8px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
    text-transform:capitalize;
}

.status-pending{
    background:#fef3c7;
    color:#92400e;
}

.status-processing{
    background:#dbeafe;
    color:#1d4ed8;
}

.status-completed{
    background:#dcfce7;
    color:#15803d;
}

.status-cancelled{
    background:#fee2e2;
    color:#b91c1c;
}


/* ===========================
   Button
=========================== */

.premium-btn{
    border:none;
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    color:#fff;
    padding:8px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
    transition:.3s;
}

.premium-btn:hover{
    color:#fff;
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(37,99,235,.25);
}


/* ===========================
   Pagination
=========================== */

.pagination{
    justify-content:center;
    margin-top:30px;
}

.pagination .page-link{
    width:42px;
    height:42px;
    display:flex;
    justify-content:center;
    align-items:center;
    border:none;
    border-radius:12px;
    margin:0 5px;
    color:#2563eb;
    background:#f8fafc;
    transition:.3s;
}

.pagination .page-link:hover{
    background:#2563eb;
    color:#fff;
}

.pagination .active .page-link{
    background:#2563eb;
    color:#fff;
    box-shadow:0 10px 20px rgba(37,99,235,.25);
}


/* ===========================
   Responsive
=========================== */

@media(max-width:991px){

    .premium-header{
        padding:20px;
    }

    .dashboard-title{
        font-size:28px;
    }

    .premium-table-card{
        padding:15px;
    }

    .premium-table thead th,
    .premium-table tbody td{
        white-space:nowrap;
    }
}
.payment-badge,
.transaction-chip,
.order-id,
.status-pill,
.premium-btn{
    white-space: nowrap;
}

.wsus__dashboard_order table tr{
    display: table-row !important;
}

.wsus__dashboard_order table{
    width:100%;
    table-layout:auto;
}

.wsus__dashboard_order table th,
.wsus__dashboard_order table td{
    display:table-cell !important;
    vertical-align:middle;
}

.package,
.price,
.p_date,
.e_date,
.method,
.tr_id,
.status{
    width:auto !important;
}

</style>
