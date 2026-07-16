```vue
<template>
  <section class="track-order-page">
    <div class="container">

      <!-- Hero Section -->
      <div class="hero-card">

        <div class="hero-left">
          <span class="subtitle">TRACK YOUR ORDER</span>

          <h1>Track Your Order</h1>

          <p>
            Enter your order code to get real-time updates on your
            order status and delivery progress.
          </p>

          <div class="feature-list">

            <div class="feature-item">
              <div class="feature-icon">🛡️</div>
              <div>
                <h6>Secure & Safe</h6>
                <small>Your information is protected</small>
              </div>
            </div>

            <div class="feature-item">
              <div class="feature-icon">⚡</div>
              <div>
                <h6>Real-Time Updates</h6>
                <small>Track your order instantly</small>
              </div>
            </div>

            <div class="feature-item">
              <div class="feature-icon">🎧</div>
              <div>
                <h6>24/7 Support</h6>
                <small>Always here to help</small>
              </div>
            </div>

          </div>
        </div>

        <div class="hero-right">
          <img
            src="https://cdn-icons-png.flaticon.com/512/3081/3081559.png"
            alt=""
          >
        </div>

      </div>

      <!-- Search Card -->

      <div class="search-card">

        <div class="search-info">
          <div class="box-icon">📦</div>

          <div>
            <h5>Enter Your Order Code</h5>
            <p>
              Find your order using your invoice number
            </p>
          </div>
        </div>

        <div class="search-form">

         <input
  type="text"
  v-model="orderCode"
  @keyup.enter="trackOrder"
  placeholder="Enter Order Code (ORD123456)"
/>

          <button
  @click="trackOrder"
  :disabled="loading"
>
  {{ loading ? 'Searching...' : 'Track Order' }}
</button>

        </div>

      </div>

      <!-- Order Result -->

      <div v-if="loading" class="result-card text-center">
  <div class="spinner-border text-success mb-3"></div>
  <h5>Searching Order...</h5>
</div>
<div v-if="errorMessage" class="result-card">
  <h4>{{ errorMessage }}</h4>
</div>
      <div v-if="order" class="result-card">

        <div class="result-header">

  <h3>Order Information</h3>

  <span
    class="status"
    :class="order.status"
  >
    {{ order.status.charAt(0).toUpperCase() + order.status.slice(1) }}
  </span>

</div>

        <div class="result-grid">

          <div class="info-box">
            <h6>Order Code</h6>
            <p>{{ order.order_code }}</p>
          </div>

          <div class="info-box">
            <h6>Customer</h6>
           <p>{{ order.billing_info?.name }}</p>
          </div>

          <div class="info-box">
            <h6>Order Date</h6>
            <p>{{ new Date(order.created_at).toLocaleDateString() }}</p>
          </div>

          <div class="info-box">
            <h6>Total Amount</h6>
            <p>৳{{ order.total }}</p>
          </div>

          <div class="info-box">
            <h6>Tracking Number</h6>
            <p>N/A</p>
          </div>

          <div class="info-box">
            <h6>Estimated Delivery</h6>
            <p>Pending</p>
          </div>

        </div>

      </div>

      <!-- Timeline -->

<div v-if="order" class="timeline-card">

  <h3>Order Progress</h3>

  <div class="timeline">

    <div class="step" :class="{ active: isPlaced() }">
      <div class="circle">✓</div>
      <p>Placed</p>
    </div>

    <div class="line" :class="{ active: isConfirmed() }"></div>

    <div class="step" :class="{ active: isConfirmed() }">
      <div class="circle">✓</div>
      <p>Confirmed</p>
    </div>

    <div class="line" :class="{ active: isShipped() }"></div>

    <div class="step" :class="{ active: isShipped() }">
      <div class="circle">🚚</div>
      <p>Shipped</p>
    </div>

    <div class="line" :class="{ active: isDelivered() }"></div>

    <div class="step" :class="{ active: isDelivered() }">
      <div class="circle">📦</div>
      <p>Delivered</p>
    </div>

  </div>

</div>

    </div>
  </section>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { BASE_URL } from "@/helpers/config";

const orderCode = ref("");
const loading = ref(false);
const order = ref(null);
const errorMessage = ref("");

const trackOrder = async () => {
  if (!orderCode.value) {
    alert("Please enter order code");
    return;
  }

    loading.value = true;
    order.value = null;
    errorMessage.value = "";

  try {
    const response = await axios.get(
      `${BASE_URL}/track-order/${orderCode.value}`
    );

    if (response.data.status === "success") {
      order.value = response.data.order;
    }
  } catch (error) {
    console.error(error);
    errorMessage.value =
    error.response?.data?.message || "Order not found";
} finally {
    loading.value = false;
  }
};
const isPlaced = () => {
  return !!order.value?.status;
};
const isConfirmed = () => {
  return ["processing", "shipped", "delivered"].includes(
    order.value?.status
  );
};

const isShipped = () => {
  return ["shipped", "delivered"].includes(
    order.value?.status
  );
};

const isDelivered = () => {
  return order.value?.status === "delivered";
};
</script>

<style scoped>

.track-order-page{
  background:#f7f8fa;
  min-height:100vh;
  padding:60px 0;
}

.hero-card{
  background:white;
  border-radius:20px;
  padding:50px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.hero-left{
  max-width:600px;
}

.subtitle{
  color:#16a34a;
  font-weight:700;
  font-size:13px;
}

.hero-left h1{
  margin-top:10px;
  font-size:48px;
  font-weight:700;
}

.hero-left p{
  color:#666;
  margin:15px 0 25px;
}

.hero-right img{
  width:320px;
}

.feature-list{
  display:flex;
  gap:20px;
}

.feature-item{
  display:flex;
  gap:10px;
  align-items:center;
}

.feature-icon{
  width:50px;
  height:50px;
  background:#eaf8ef;
  border-radius:50%;
  display:flex;
  justify-content:center;
  align-items:center;
}

.search-card{
  margin-top:30px;
  background:white;
  border-radius:20px;
  padding:25px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.search-info{
  display:flex;
  gap:15px;
  align-items:center;
}

.box-icon{
  font-size:35px;
}

.search-form{
  display:flex;
  gap:10px;
  width:55%;
}

.search-form input{
  flex:1;
  height:55px;
  border:1px solid #ddd;
  border-radius:10px;
  padding:0 15px;
}

.search-form button{
  border:none;
  background:#16a34a;
  color:white;
  border-radius:10px;
  padding:0 25px;
  font-weight:600;
}

.result-card,
.timeline-card{
  margin-top:30px;
  background:white;
  border-radius:20px;
  padding:30px;
  box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.result-header{
  display:flex;
  justify-content:space-between;
  margin-bottom:20px;
}

.status{
  background:#16a34a;
  color:white;
  padding:8px 16px;
  border-radius:20px;
}
.status.pending{
  background:#f59e0b;
}

.status.processing{
  background:#3b82f6;
}

.status.shipped{
  background:#10b981;
}

.status.delivered{
  background:#22c55e;
}

.status.cancelled{
  background:#ef4444;
}
.result-grid{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:20px;
}

.info-box{
  background:#f8f9fb;
  padding:15px;
  border-radius:12px;
}

.timeline{
  display:flex;
  align-items:center;
  margin-top:30px;
}

.step{
  text-align:center;
}

.circle{
  width:60px;
  height:60px;
  border-radius:50%;
  background:#eee;
  display:flex;
  align-items:center;
  justify-content:center;
  margin:auto;
}

.active .circle{
  background:#16a34a;
  color:white;
}

.line{
  height:4px;
  flex:1;
  background:#ddd;
}

.line.active{
  background:#16a34a;
}
.loader{
  width:50px;
  height:50px;
  border:4px solid #eee;
  border-top:4px solid #16a34a;
  border-radius:50%;
  animation:spin 1s linear infinite;
  margin:0 auto 15px;
}

@keyframes spin{
  100%{
    transform:rotate(360deg);
  }
}
@media(max-width:768px){

.hero-card,
.search-card{
  flex-direction:column;
  text-align:center;
}

.hero-right img{
  width:220px;
  margin-top:20px;
}

.feature-list{
  flex-direction:column;
}

.search-form{
  width:100%;
  margin-top:20px;
}

.result-grid{
  grid-template-columns:1fr;
}

.timeline{
  flex-direction:column;
  gap:15px;
}

.line{
  width:4px;
  height:40px;
}
}
</style>
```
