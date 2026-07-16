<template>
<section class="contact-page">
<!--=========================
    CONTACT HERO START
==========================-->

<section class="contact-hero">

    <div class="hero-overlay"></div>

    <div class="container">

        <div class="hero-content">

            <h1>
                CONTACT US
            </h1>

            <span class="sub-title">
                We'd Love To Hear From You
            </span>

            <p>
                Whether you have a question about products, orders,
                shipping or anything else, our team is always ready to help.
            </p>

            <div class="hero-breadcrumb">

                <router-link to="/">
                    Home
                </router-link>

                <span>/</span>

                <span>
                    Contact
                </span>

            </div>

        </div>

    </div>

</section>

<!--=========================
    CONTACT HERO END
==========================-->

    <div class="container">

        <div class="row gy-5">

            <!-- Contact Info -->

            <div class="col-lg-5">

                <div class="info-box">

    <span class="small-title">
        CONTACT INFORMATION
    </span>

    <h2>
        Let's Start a Conversation
    </h2>

    <p class="info-description">
        Have a question or need assistance? Our support team is always
        available to help you with products, orders and services.
    </p>

    <!-- Card -->

    <div class="info-item">

        <div class="icon-box">
            <i class="fas fa-map-marker-alt"></i>
        </div>

        <div>

            <h5>Office Address</h5>

            <p>Dhaka, Bangladesh</p>

        </div>

    </div>

    <div class="info-item">

        <div class="icon-box">
            <i class="fas fa-phone"></i>
        </div>

        <div>

            <h5>Call Us</h5>

            <p>+880 1234 567890</p>

        </div>

    </div>

    <div class="info-item">

        <div class="icon-box">
            <i class="fas fa-envelope"></i>
        </div>

        <div>

            <h5>Email</h5>

            <p>support@velvetco.com</p>

        </div>

    </div>

    <div class="info-item">

        <div class="icon-box">
            <i class="far fa-clock"></i>
        </div>

        <div>

            <h5>Working Hours</h5>

            <p>Monday - Saturday | 9 AM - 8 PM</p>

        </div>

    </div>

</div>

            </div>

            <!-- Form -->

            <div class="col-lg-7">

                <div class="form-box">

    <span class="small-title">
        SEND MESSAGE
    </span>

    <h2>
        Let's Talk
    </h2>

    <p class="form-description">
        Fill out the form below and we'll get back to you within 24 hours.
    </p>

    <form>

        <div class="row">

            <div class="col-md-6 mb-4">

                <div class="input-group-custom">

                    <i class="fas fa-user"></i>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Your Name"
                    >

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="input-group-custom">

                    <i class="fas fa-envelope"></i>

                    <input
                        type="email"
                        class="form-control"
                        placeholder="Your Email"
                    >

                </div>

            </div>

            <div class="col-12 mb-4">

                <div class="input-group-custom">

                    <i class="fas fa-tag"></i>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Subject"
                    >

                </div>

            </div>

            <div class="col-12 mb-4">

                <div class="input-group-custom textarea-box">

                    <i class="fas fa-comment"></i>

                    <textarea
                        rows="6"
                        class="form-control"
                        placeholder="Write your message..."
                    ></textarea>

                </div>

            </div>

            <div class="col-12">

                <button type="submit" class="btn-send">

                    <span>Send Message</span>

                    <i class="fas fa-paper-plane"></i>

                </button>

            </div>

        </div>

    </form>

</div>

            </div>

        </div>

    </div>

</section>
<!--=================================
        FAQ SECTION
==================================-->

<section class="faq-section">

    <div class="container">

        <div class="section-title">

            <span>HELP CENTER</span>

            <h2>Frequently Asked Questions</h2>

            <p>
                Find quick answers to the most common questions.
            </p>

        </div>

        <div class="accordion" id="faqAccordion">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq1">

                        How long does shipping take?

                    </button>

                </h2>

                <div id="faq1"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Usually between 2-5 business days depending on your
                        location.

                    </div>

                </div>

            </div>

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">

                        Can I return a product?

                    </button>

                </h2>

                <div id="faq2"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Yes. You can return any unused product within 7 days.

                    </div>

                </div>

            </div>

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">

                        Do you provide international shipping?

                    </button>

                </h2>

                <div id="faq3"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Currently we only ship within Bangladesh.

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!--=================================
        CTA
==================================-->

<section class="contact-cta">

    <div class="container">

        <div class="cta-box">

            <h2>

                Still Have Questions?

            </h2>

            <p>

                Our support team is available every day to help you.

            </p>

            <a href="mailto:support@velvetco.com"
                class="cta-btn">

                Contact Support

            </a>

        </div>

    </div>

</section>
</template>

<script setup>
</script>

<style scoped>
/*==========================
        HERO
===========================*/

.contact-page{

    background:#fff;

}

.contact-hero{

    position:relative;

    height:430px;

    overflow:hidden;

    display:flex;

    align-items:center;

    justify-content:center;

    text-align:center;

    background:url("https://images.unsplash.com/photo-1523381210434-271e8be1f52b?q=80&w=2070&auto=format&fit=crop")
    center center/cover no-repeat;
    margin: 0 0 40px;

}

.hero-overlay{

    position:absolute;

    inset:0;

    background:rgba(0,0,0,.55);

    backdrop-filter:blur(2px);

}

.hero-content{

    position:relative;

    z-index:10;

    color:white;

}

.sub-title{

    color:#E5CC91;

    font-size:15px;

    letter-spacing:4px;

    font-weight:600;

    display:inline-block;

    margin-bottom:18px;

}

.hero-content h1{

    font-size:62px;

    font-weight:700;

    margin-bottom:20px;
    color:#E5CC91;
}

.hero-content p{

    max-width:700px;

    margin:auto;

    color:#ddd;

    font-size:18px;

    line-height:32px;

}

.hero-breadcrumb{

    margin-top:35px;

}

.hero-breadcrumb a{

    color:#E5CC91;

    text-decoration:none;

    transition:.3s;

}

.hero-breadcrumb a:hover{

    color:white;

}

.hero-breadcrumb span{

    margin:0 8px;

    color:#fff;

}

/* Responsive */

@media(max-width:992px){

.hero-content h1{

font-size:42px;

}

}

@media(max-width:576px){

.contact-hero{

height:340px;

}

.hero-content h1{

font-size:32px;

}

.hero-content p{

font-size:15px;

line-height:28px;

}
}
/*==========================
        HERO END
===========================*/

/*============================
        INFO BOX
=============================*/

.info-box{

    height:100%;

    background:#fff;

    border-radius:30px;

    padding:45px;

    box-shadow:0 20px 50px rgba(0,0,0,.08);

}

.small-title{

    color:#E5CC91;

    letter-spacing:3px;

    font-size:13px;

    font-weight:700;

}

.info-box h2{

    font-size:36px;

    margin:15px 0;

    font-weight:700;

}

.info-description{

    color:#777;

    line-height:30px;

    margin-bottom:40px;

}

/* CARD */

.info-item{

    display:flex;

    align-items:center;

    padding:22px;

    border-radius:18px;

    margin-bottom:18px;

    transition:.35s;

    border:1px solid #f1f1f1;

    cursor:pointer;

}

.info-item:hover{

    transform:translateY(-8px);

    box-shadow:0 20px 45px rgba(0,0,0,.08);

}

.icon-box{

    width:68px;

    height:68px;

    border-radius:18px;

    background:#E5CC91;

    display:flex;

    justify-content:center;

    align-items:center;

    margin-right:20px;

    transition:.4s;

}

.icon-box i{

    font-size:22px;

    color:#111;

    transition:.4s;

}

.info-item:hover .icon-box{

    background:#111;

    transform:rotate(-8deg);

}

.info-item:hover .icon-box i{

    color:#E5CC91;

}

.info-item h5{

    font-weight:700;

    margin-bottom:8px;

}

.info-item p{

    margin:0;

    color:#777;

}
/*============================
        INFO BOX END
=============================*/

/*=========================
        FORM BOX
==========================*/

.form-box{

    background:#fff;

    border-radius:30px;

    padding:45px;

    box-shadow:0 20px 50px rgba(0,0,0,.08);

}

.form-description{

    color:#777;

    margin:15px 0 35px;

    line-height:30px;

}

.input-group-custom{

    position:relative;

}

.input-group-custom i{

    position:absolute;

    left:22px;

    top:50%;

    transform:translateY(-50%);

    color:#999;

    transition:.35s;

}

.input-group-custom input{

    height:60px;

    padding-left:60px;

    border-radius:15px;

    border:1px solid #e8e8e8;

    transition:.35s;

}

.textarea-box i{

    top:28px;

    transform:none;

}

.textarea-box textarea{

    padding-left:60px;

    padding-top:18px;

    border-radius:15px;

    border:1px solid #e8e8e8;

    resize:none;

}

.form-control:focus{

    border-color:#E5CC91;

    box-shadow:0 0 0 4px rgba(229,204,145,.18);

}

.input-group-custom:focus-within i{

    color:#E5CC91;

}

.btn-send{

    display:inline-flex;

    align-items:center;

    gap:12px;

    background:#E5CC91;

    color:#111;

    border:none;

    padding:16px 40px;

    border-radius:50px;

    font-weight:700;

    transition:.35s;

}

.btn-send:hover{

    background:#111;

    color:#E5CC91;

    transform:translateY(-4px);

    box-shadow:0 18px 35px rgba(0,0,0,.18);

}

.btn-send i{

    transition:.35s;

}

.btn-send:hover i{

    transform:translateX(6px);

}
/*=============================
        FAQ
==============================*/

.faq-section{

padding:100px 0;

}

.section-title{

text-align:center;

margin-bottom:60px;

}

.section-title span{

color:#E5CC91;

font-weight:700;

letter-spacing:3px;

}

.section-title h2{

font-size:42px;

font-weight:700;

margin:15px 0;

}

.section-title p{

color:#777;

}

.accordion-item{

border:none;

margin-bottom:18px;

border-radius:18px!important;

overflow:hidden;

box-shadow:0 15px 35px rgba(0,0,0,.06);

}

.accordion-button{

padding:24px;

font-weight:600;

}

.accordion-button:not(.collapsed){

background:#E5CC91;

color:#111;

}

.accordion-button:focus{

box-shadow:none;

}

.accordion-body{

padding:25px;

color:#666;

line-height:30px;

}



/*============================
        CTA
=============================*/

.contact-cta{

padding-bottom:100px;

}

.cta-box{

background:#111;

border-radius:30px;

padding:70px;

text-align:center;

color:white;

}

.cta-box h2{

font-size:42px;

margin-bottom:20px;
color:#ccc;

}

.cta-box p{

color:#ccc;

margin-bottom:35px;

}

.cta-btn{

display:inline-block;

padding:18px 45px;

background:#E5CC91;

border-radius:50px;

font-weight:700;

text-decoration:none;

color:#111;

transition:.35s;

}

.cta-btn:hover{

background:white;

transform:translateY(-5px);

color:#111;

}
</style>