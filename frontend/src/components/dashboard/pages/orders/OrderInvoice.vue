<script setup lang="ts">
import SideBar from '../../layouts/SideBar.vue';
import { useRoute, useRouter } from 'vue-router';
import { ref, onMounted, computed } from 'vue';
import { useOrderListStore } from '@/stores/useOrderListStore';
import { useToast } from 'vue-toastification';

const props = defineProps({
    id: {
        type: String,
        required: true
    }
});
const route = useRoute();
const router = useRouter();
const toast = useToast();
const orderStore = useOrderListStore();

const loading = computed(() => orderStore.loading);
const error = computed(() => orderStore.error);
const order = computed(() => orderStore.currentOrder);

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
};

const formatPrice = (price) => {
    return new Intl.NumberFormat('en-BD', {
        style: 'currency',
        currency: 'BDT'
    }).format(price);
};

onMounted(async () => {
    try {
        await orderStore.fetchOrderDetail(route.params.id);

        if (!order.value) {
            toast.error('Order not found');
            router.push({ name: 'user-orders' });
        }
    } catch (err) {
        toast.error(error.value || 'Failed to load order');
    }
});

const printInvoice = () => {
    window.print();
};
const cancelLoading = ref(false);

const canCancelOrder = computed(() => {
    return order.value?.status === 'pending';
});

const handleCancelOrder = async () => {
    if (!confirm('Are you sure you want to cancel this order?')) return;

    cancelLoading.value = true;
    try {
        await orderStore.cancelOrder(route.params.id);
        toast.success('Order has been cancelled successfully!');

        // Refresh order details
        await orderStore.fetchOrderDetail(route.params.id);
    } catch (err) {
        toast.error(err.message || 'Failed to cancel order!');
    } finally {
        cancelLoading.value = false;
    }
};
</script>

<template>
    <SideBar />

    <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <div class="dashboard_content">
                <div v-if="loading" class="invoice-state">
                    <div class="invoice-spinner" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="invoice-state_text">Loading order details…</p>
                </div>

                <div v-else-if="error" class="invoice-state invoice-state--error">
                    <i class="fas fa-triangle-exclamation"></i>
                    <p class="invoice-state_text">{{ error }}</p>
                </div>

                <div v-else-if="order" class="wsus__invoice_area invoice-card">

                    <!-- Top bar: order id + live status -->
                    <div class="invoice-topbar">
                        <div>
                            <span class="invoice-eyebrow">Order</span>
                            <h2 class="invoice-order-code">#{{ order.order_code }}</h2>
                            <p class="invoice-order-date">
                                <i class="far fa-calendar"></i>
                                Placed {{ formatDate(order.created_at) }}
                            </p>
                        </div>

                        <span
                            class="invoice-status"
                            :class="{
                                'invoice-status--pending': order.status === 'pending',
                                'invoice-status--processing': order.status === 'processing',
                                'invoice-status--completed': order.status === 'completed',
                                'invoice-status--cancelled': order.status === 'cancelled'
                            }"
                        >
                            <span class="invoice-status_dot"></span>
                            {{ order.status }}
                        </span>
                    </div>

                    <div class="wsus__invoice_header">
                        <div class="wsus__invoice_content">
                            <div class="invoice-meta-grid">
                                <div class="invoice-meta-block">
                                    <h5><i class="fas fa-file-invoice"></i> Invoice to</h5>
                                    <h6>{{ order.billing_info.name }}</h6>
                                    <p>{{ order.billing_info.email }}</p>
                                    <p>{{ order.billing_info.phone }}</p>
                                    <p>{{ order.billing_info.address }}</p>
                                </div>

                                <div class="invoice-meta-block invoice-meta-block--center">
                                    <h5><i class="fas fa-circle-info"></i> Order information</h5>
                                    <p><span class="invoice-meta-label">Order #</span> {{ order.order_code }}</p>
                                    <p><span class="invoice-meta-label">Date</span> {{ formatDate(order.created_at) }}</p>
                                    <p class="invoice-meta-payment">
                                        <span class="invoice-meta-label">Payment</span>
                                        <span
                                            class="invoice-pill"
                                            :class="{
                                                'invoice-pill--cod': order.payment_method === 'cod',
                                                'invoice-pill--momo': order.payment_method === 'momo'
                                            }"
                                        >
                                            {{ order.payment_method === 'cod' ? 'COD' : 'Momo' }}
                                        </span>
                                    </p>
                                </div>

                                <div class="invoice-meta-block invoice-meta-block--right">
                                    <h5><i class="fas fa-truck"></i> Shipping to</h5>
                                    <h6>{{ order.billing_info.name }}</h6>
                                    <p>{{ order.billing_info.address }}</p>
                                    <p>{{ order.billing_info.city }}</p>
                                    <p>{{ order.billing_info.zip }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="wsus__invoice_description">
                            <div class="table-responsive invoice-table-wrap">
                                <table class="table invoice-table">
                                    <thead>
                                        <tr>
                                            <th class="images">Image</th>
                                            <th class="name">Product</th>
                                            <th class="amount">Price</th>
                                            <th class="quantity">Qty</th>
                                            <th class="total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="product in order.products" :key="product.id">
                                            <td class="images">
                                                <img :src="product.pivot.image_url || '/assets/images/default-product.jpg'"
                                                    :alt="product.name" class="img-fluid invoice-product-img">
                                            </td>
                                            <td class="name">
                                                <p class="invoice-product-name">{{ product.name }}</p>
                                                <span v-if="product.pivot.color" class="invoice-variant">Color: {{ product.pivot.color }}</span>
                                                <span v-if="product.pivot && product.pivot.size" class="invoice-variant"> | Size: {{ product.pivot.size }}</span>
                                            </td>
                                            <td class="amount">{{ formatPrice(product.price) }}</td>
                                            <td class="quantity"><span class="invoice-qty-badge">{{ product.pivot.quantity }}</span></td>
                                            <td class="total">{{ formatPrice(product.pivot.price * product.pivot.quantity) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="wsus__invoice_footer invoice-summary">
                        <div class="invoice-summary_row">
                            <span>Subtotal</span>
                            <span>{{ formatPrice(order.subtotal) }}</span>
                        </div>
                        <div class="invoice-summary_row">
                            <span>Shipping fee</span>
                            <span>{{ formatPrice(order.shipping_fee) }}</span>
                        </div>
                        <div class="invoice-summary_row invoice-summary_row--discount">
                            <span>Discount</span>
                            <span>-{{ formatPrice(order.discount) }}</span>
                        </div>
                        <div class="invoice-summary_row invoice-summary_row--total">
                            <span>Total</span>
                            <span>{{ formatPrice(order.total) }}</span>
                        </div>
                    </div>

                    <div class="invoice-actions">
                        <button
                            v-if="canCancelOrder"
                            class="btn invoice-btn invoice-btn--danger"
                            @click="handleCancelOrder"
                            :disabled="cancelLoading"
                        >
                            <span v-if="cancelLoading" class="spinner-border spinner-border-sm me-1"></span>
                            <i v-else class="fas fa-xmark me-1"></i>
                            {{ cancelLoading ? 'Processing…' : 'Cancel order' }}
                        </button>
                        <span v-else></span>

                        <button class="btn invoice-btn invoice-btn--primary" @click="printInvoice">
                            <i class="fas fa-print me-2"></i> Print invoice
                        </button>
                    </div>
                </div>

                <div v-else class="invoice-state invoice-state--empty">
                    <i class="fas fa-box-open"></i>
                    <p class="invoice-state_text">Order not found</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* ---------- Tokens ---------- */
.invoice-card {
    --ink: #1e293b;
    --muted: #64748b;
    --line: #e7eaf0;
    --surface: #ffffff;
    --panel: #f8f9fc;
    --brand: #4f46e5;
    --brand-soft: #eef0fe;
    --amber: #d97706;
    --amber-soft: #fef3e2;
    --blue: #2563eb;
    --blue-soft: #eaf1ff;
    --green: #16a34a;
    --green-soft: #e9f9ef;
    --red: #dc2626;
    --red-soft: #fdecec;
    --radius: 14px;

    background: var(--surface);
    border: 1px solid var(--line);
    border-radius: var(--radius);
    box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04), 0 8px 24px rgba(16, 24, 40, 0.04);
    padding: 32px;
    color: var(--ink);
    font-family: inherit;
}

/* ---------- Loading / error / empty states ---------- */
.invoice-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 14px;
    padding: 80px 20px;
    text-align: center;
    color: #64748b;
}

.invoice-state i {
    font-size: 28px;
}

.invoice-state--error i { color: #dc2626; }
.invoice-state--empty i { color: #94a3b8; }

.invoice-state_text {
    margin: 0;
    font-size: 15px;
}

.invoice-spinner {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 3px solid #e7eaf0;
    border-top-color: #4f46e5;
    animation: invoice-spin 0.8s linear infinite;
}

@keyframes invoice-spin {
    to { transform: rotate(360deg); }
}

/* ---------- Top bar ---------- */
.invoice-topbar {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    padding-bottom: 24px;
    margin-bottom: 24px;
    border-bottom: 1px dashed var(--line);
}

.invoice-eyebrow {
    display: block;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 4px;
}

.invoice-order-code {
    margin: 0;
    font-size: 26px;
    font-weight: 700;
    letter-spacing: -0.01em;
}

.invoice-order-date {
    margin: 6px 0 0;
    font-size: 13px;
    color: var(--muted);
    display: flex;
    align-items: center;
    gap: 6px;
}

.invoice-status {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    text-transform: capitalize;
    white-space: nowrap;
}

.invoice-status_dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: currentColor;
}

.invoice-status--pending { background: var(--amber-soft); color: var(--amber); }
.invoice-status--processing { background: var(--blue-soft); color: var(--blue); }
.invoice-status--completed { background: var(--green-soft); color: var(--green); }
.invoice-status--cancelled { background: var(--red-soft); color: var(--red); }

/* ---------- Meta grid (invoice to / order info / shipping) ---------- */
.invoice-meta-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    background: var(--panel);
    border: 1px solid var(--line);
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 28px;
}

.invoice-meta-block h5 {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--muted);
    margin: 0 0 12px;
}

.invoice-meta-block h5 i { color: var(--brand); }

.invoice-meta-block h6 {
    margin: 0 0 4px;
    font-weight: 600;
    color: var(--ink);
}

.invoice-meta-block p {
    margin: 0 0 4px;
    font-size: 13.5px;
    color: #475569;
    line-height: 1.5;
}

.invoice-meta-label {
    color: var(--muted);
    margin-right: 4px;
}

.invoice-meta-block--center { text-align: center; }
.invoice-meta-block--right { text-align: right; }
.invoice-meta-payment { display: flex; align-items: center; justify-content: center; gap: 6px; }

.invoice-pill {
    display: inline-block;
    padding: 2px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
}

.invoice-pill--cod { background: var(--brand-soft); color: var(--brand); }
.invoice-pill--momo { background: var(--green-soft); color: var(--green); }

/* ---------- Table ---------- */
.invoice-table-wrap {
    border: 1px solid var(--line);
    border-radius: 12px;
    overflow: hidden;
}

.invoice-table {
    margin: 0;
}

.invoice-table thead th {
    background: var(--panel);
    border-bottom: 1px solid var(--line);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--muted);
    padding: 14px 16px;
    white-space: nowrap;
}

.invoice-table tbody td {
    padding: 14px 16px;
    vertical-align: middle;
    border-bottom: 1px solid var(--line);
    font-size: 14px;
}

.invoice-table tbody tr:last-child td {
    border-bottom: none;
}

.invoice-table tbody tr:hover {
    background: #fafbff;
}

.invoice-product-img {
    max-width: 56px;
    border-radius: 8px;
    border: 1px solid var(--line);
    object-fit: cover;
}

.invoice-product-name {
    margin: 0 0 2px;
    font-weight: 600;
    color: var(--ink);
}

.invoice-variant {
    font-size: 12.5px;
    color: var(--muted);
}

.invoice-qty-badge {
    display: inline-flex;
    min-width: 28px;
    justify-content: center;
    padding: 3px 8px;
    border-radius: 6px;
    background: var(--panel);
    border: 1px solid var(--line);
    font-weight: 600;
    font-size: 13px;
}

.invoice-table .total {
    font-weight: 700;
}

/* ---------- Summary ---------- */
.invoice-summary {
    margin-top: 24px;
    margin-left: auto;
    width: 100%;
    max-width: 320px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.invoice-summary_row {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #475569;
}

.invoice-summary_row--discount span:last-child {
    color: var(--red);
}

.invoice-summary_row--total {
    margin-top: 6px;
    padding-top: 14px;
    border-top: 1px solid var(--line);
    font-size: 18px;
    font-weight: 700;
    color: var(--ink);
}

.invoice-summary_row--total span:last-child {
    color: var(--brand);
}

/* ---------- Actions ---------- */
.invoice-actions {
    margin-top: 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.invoice-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 22px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    border: 1px solid transparent;
    transition: transform 0.12s ease, box-shadow 0.12s ease, opacity 0.12s ease;
}

.invoice-btn:active {
    transform: translateY(1px);
}

.invoice-btn--primary {
    background: var(--brand);
    color: #fff;
    box-shadow: 0 6px 16px rgba(79, 70, 229, 0.25);
}

.invoice-btn--primary:hover {
    box-shadow: 0 8px 20px rgba(79, 70, 229, 0.32);
}

.invoice-btn--danger {
    background: var(--red-soft);
    color: var(--red);
    border-color: rgba(220, 38, 38, 0.15);
}

.invoice-btn--danger:hover {
    background: #fde2e2;
}

.invoice-btn:disabled {
    opacity: 0.65;
    cursor: not-allowed;
}

/* ---------- Responsive ---------- */
@media (max-width: 991px) {
    .invoice-meta-grid {
        grid-template-columns: 1fr;
    }

    .invoice-meta-block--center,
    .invoice-meta-block--right {
        text-align: left;
    }

    .invoice-meta-payment {
        justify-content: flex-start;
    }

    .invoice-summary {
        max-width: none;
    }
}

@media (max-width: 575px) {
    .invoice-card {
        padding: 20px;
    }

    .invoice-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .invoice-btn {
        width: 100%;
    }
}

/* ---------- Print ---------- */
@media print {
    .invoice-actions,
    .invoice-status_dot {
        display: none !important;
    }

    .invoice-card {
        box-shadow: none;
        border: none;
        padding: 0;
    }
}
</style>