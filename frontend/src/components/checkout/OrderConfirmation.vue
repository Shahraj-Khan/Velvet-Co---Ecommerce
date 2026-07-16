<template>
  <div v-if="loading" class="text-center py-5">
    <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <p class="mt-2">Đang tải thông tin đơn hàng...</p>
  </div>

  <div v-else-if="order" class="container py-5">
    <div class="card shadow">
      <div class="card-body">
        <h2 class="text-success mb-4">
          <i class="bi bi-check-circle-fill"></i> Order placed successfully!
        </h2>
        
        <div class="order-details">
          <p><strong>Order ID:</strong> {{ order.order_code || order.id }}</p>
          <p><strong>Purchase date:</strong> {{ new Date(order.created_at).toLocaleString() }}</p>
          <p><strong>Payment method:</strong> {{ route.query.payment_method === 'cod' ? 'COD' : 'Momo' }}</p>
          <p><strong>Total amount:</strong> {{ formatPrice(order.total) }}</p>
          <p><strong>Status:</strong> {{ order.status || 'Đang xử lý' }}</p>
        </div>

        <div class="mt-4">
          <h5>Shipping information</h5>
          <p>{{ order.billing?.name }}</p>
          <p>{{ order.billing?.phone }}</p>
          <p>{{ order.billing?.address }}, {{ order.billing?.city }}</p>
        </div>

        <div class="mt-4 no-print">
          <button @click="router.push('/')" class="btn btn-primary">
            <i class="bi bi-house-door"></i> Back to home
          </button>
        </div>
      </div>
    </div>
  </div>

  <div v-else class="alert alert-danger text-center">
    We couldn't find your order
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'
import { BASE_URL } from '@/helpers/config'
import { useToast } from 'vue-toastification'
import { useAuthStore } from '@/stores/useAuthStore'
import { usePaymentStore } from '@/stores/usePaymentStore'

const route = useRoute()
const router = useRouter()
const toast = useToast()
const order = ref(null)
const loading = ref(true)
const authStore = useAuthStore()
const paymentStore = usePaymentStore()

const formatPrice = (price) => {
  return new Intl.NumberFormat('en-BD', {
    style: 'currency',
    currency: 'BDT'
  }).format(price)
}

onMounted(async () => {
  try {
    // Kiểm tra nếu đã có order trong payment store
    if (paymentStore.currentOrder) {
      order.value = paymentStore.currentOrder
      loading.value = false
      return
    }

    // Nếu không, gọi API để lấy thông tin
    const response = await axios.get(`${BASE_URL}/orders/${route.params.id}`, {
      headers: {
        'Authorization': `Bearer ${authStore.accessToken}`
      }
    })
    
    order.value = response.data.data // Điều chỉnh theo cấu trúc response thực tế
    paymentStore.setCurrentOrder(response.data.data) // Lưu vào store
    
  } catch (error) {
    console.error('Error retrieving order details:', error)
    toast.error('Unable to load order details: ' + (error.response?.data?.message || error.message))
    router.push('/')
  } finally {
    loading.value = false
  }
})
</script>
  
  <style scoped>
  @media print {
    .no-print {
      display: none !important;
    }
    
    body {
      background: white !important;
      font-size: 12pt;
    }
    
    .card {
      border: none !important;
      box-shadow: none !important;
    }
  }
  
  .order-details {
    text-align: left;
  }
  
  .table th, .table td {
    vertical-align: middle;
  }
  
  .img-thumbnail {
    max-height: 60px;
    object-fit: contain;
  }
  </style>