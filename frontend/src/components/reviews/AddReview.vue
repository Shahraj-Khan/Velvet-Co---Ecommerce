<template>
    <div class="review-card">
        <Spinner :store="productDetailStore" />
<div class="review-header">

    <span class="review-badge">
        Share Your Experience
    </span>

    <h3>
        Write a Review
    </h3>

    <p>
        Tell other customers what you think about this product.
    </p>

</div>
        
        <div class="card-body">
            <form
    @submit.prevent="addReview"
    class="review-form">
                
<div class="form-group">

    <label>Review Title</label>

    <input
        type="text"
        class="review-input"
        v-model="data.review.title"
        required
        placeholder="Example: Amazing quality watch"
    >

</div>
                
<div class="form-group">

    <label>Your Review</label>

    <textarea
        class="review-textarea"
        rows="5"
        v-model="data.review.body"
        required
        placeholder="Tell us about the product quality, delivery and your experience...">
    </textarea>

</div>
                
<div class="form-group">

    <label>Your Rating</label>

    <div class="rating-box">

        <StarRating
            v-model:rating="data.review.rating"
            :show-rating="false"
            :star-size="30"
            :padding="6"
            active-color="#B8943B"
            inactive-color="#E5E5E5"
        />

    </div>

</div>
                
<div class="submit-area">

    <button
        type="submit"
        class="submit-review-btn"
        :disabled="data.review.rating === 0"
    >
        Submit Review
    </button>

</div>
            
            </form>
        </div>
    </div>
</template>

<script setup>
    import { reactive } from "vue"

    import Spinner from "../layouts/Spinner.vue"
    import StarRating from "vue-star-rating"
import { useProductDetailStore } from "@/stores/useProductsStoreDetail"

    //define the store
    const productDetailStore = useProductDetailStore() 

    //define the data object
    const data = reactive({
        review: {
            title: '',
            body: '',
            rating: 0
        }
    })

    //add review function
    const addReview = () => {
        productDetailStore.storeReview(data.review)
        data.review = {
            title: '',
            body: '',
            rating: 0
        }
    }
</script>

<style scoped>

.review-card{
    background:#fff;
    border-radius:22px;
    padding:40px;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
}

.review-header{
    margin-bottom:35px;
}

.review-header h3{
    font-size:32px;
    font-weight:700;
    color:#222;
    margin:15px 0 10px;
}

.review-header p{
    color:#777;
    font-size:15px;
    line-height:1.8;
}

.review-header{
    margin-bottom:35px;
}

.review-header h3{
    font-size:32px;
    font-weight:700;
    color:#222;
    margin:15px 0 10px;
}

.review-header p{
    color:#777;
    font-size:15px;
    line-height:1.8;
}

.review-badge{
    display:inline-block;
    padding:8px 18px;
    border-radius:30px;
    background:#F8F4EA;
    color:#B8943B;
    font-size:13px;
    font-weight:600;
}

.review-form{
    max-width:750px;
}

.form-group{
    margin-bottom:25px;
}

.form-group label{
    display:block;
    margin-bottom:10px;
    font-weight:600;
    color:#222;
}

.review-input{
    width:100%;
    height:54px;
    border:1px solid #E8E8E8;
    border-radius:12px;
    padding:0 18px;
    transition:.3s;
}

.review-textarea{
    width:100%;
    border:1px solid #E8E8E8;
    border-radius:12px;
    padding:16px 18px;
    resize:none;
    transition:.3s;
}

.review-input:focus,
.review-textarea:focus{
    outline:none;
    border-color:#B8943B;
    box-shadow:0 0 0 4px rgba(184,148,59,.12);
}

.submit-review-btn{
    background:#EDCFA3;
    color:#fff;
    border:none;
    padding:14px 34px;
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.submit-review-btn:hover{
    background:#222;
}

.submit-review-btn:disabled{
    background:#ccc;
    cursor:not-allowed;
}

.rating-box{
    display:flex;
    align-items:center;
    min-height:58px;
    padding:0 18px;
    border:1px solid #E8E8E8;
    border-radius:12px;
    background:#fff;
}

.review-card{
    transition:.35s;
}

.review-card:hover{
    transform:translateY(-4px);
}

.submit-review-btn{
    transition:all .3s ease;
}

.submit-review-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(184,148,59,.30);
}

@media (max-width:768px){

    .review-card{
        padding:25px;
    }

    .review-header h3{
        font-size:26px;
    }

    .review-header p{
        font-size:14px;
    }

    .review-input{
        height:50px;
    }

    .submit-review-btn{
        width:100%;
    }

}

</style>