<template>
    <div class="wsus__product_item">
      <span class="wsus__new" v-if="product.is_new">Mới</span>
      <span class="wsus__minus" v-if="product.discount > 0">
        -{{ product.discount }}%
      </span>
      
      <router-link class="wsus__pro_link" :to="`/product/${product.slug}`">
        <img :src="product.thumbnail" :alt="product.name" class="img-fluid w-100" />
      </router-link>
      
      <div class="wsus__product_details">
        <router-link class="wsus__category" :to="`/category/${product.category.slug}`">
          {{ product.category.name }}
        </router-link>
        
        <p class="wsus__pro_rating">
          <i class="fas fa-star" v-for="star in 5" :key="star"
             :class="{ 'text-warning': star <= product.average_rating }"></i>
          <span>({{ product.reviews_count }})</span>
        </p>
        
        <router-link class="wsus__pro_name" :to="`/product/${product.slug}`">
          {{ product.name }}
        </router-link>
        
        <p class="wsus__price" v-if="product.discount > 0">
          {{ formatPrice(product.discounted_price) }}
          <del>{{ formatPrice(product.price) }}</del>
        </p>
        <p class="wsus__price" v-else>
          {{ formatPrice(product.price) }}
        </p>
        
        
        <a class="add_cart" href="#" @click.prevent="addToCart">Add to Cart</a>
      </div>
    </div>
  </template>
  
<script setup>
import { useCartStore } from '@/stores/useCartStore';
import { makeUniqueId } from '@/helpers/config';

const props = defineProps({
  product: {
    type: Object,
    required: true
  }
});

const cartStore = useCartStore();

const formatPrice = (price) => {
  return new Intl.NumberFormat('en-BD', {
    style: 'currency',
    currency: 'BDT'
  }).format(price);
};

const addToCart = () => {
  cartStore.addToCart({
    ref: makeUniqueId(10),
    product_id: props.product.id,
    name: props.product.name,
    slug: props.product.slug,
    quantity: 1,
    price: props.product.discount > 0
      ? props.product.discounted_price
      : props.product.price,
    color: null,
    size: null,
    maxQuantity: props.product.quantity,
    image: props.product.thumbnail,
    coupon_id: null,
  });
};
</script>
  
  <style scoped>


  </style>