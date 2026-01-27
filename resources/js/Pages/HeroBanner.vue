<template>
    <section class="hero">
        <div class="content">
            <span class="discount">Quality • Safety • Reliability</span>

            <h1>
                Modern Home<br />
                <strong>Construction Services</strong>
            </h1>

            <p class="price">Projects from <span>Planning to Delivery</span></p>

            <button class="btn">OUR PROJECTS</button>
        </div>

        <!-- <div class="image">
      <img
        src="/public/headphone-girl.jpg"
        alt="Wireless Headphones"
      />
    </div> -->
    </section>
</template>

<style scoped>
.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* background: #f6f6f6; */
    color: white;
    padding: 3rem 4rem;
    /* border-radius: 6px; */
    overflow: hidden;
    background-size: cover;
    background-position: center;
    background-image:
        linear-gradient(#444444c7, rgba(43, 43, 43, 0.829)),
        url("/public/casque.jpg");
}

/* LEFT CONTENT */
.content {
    max-width: 45%;
}

.discount {
    font-size: 14px;
    color: #dfdfdf;
    display: block;
    margin-bottom: 1rem;
}

h1 {
    font-size: 38px;
    line-height: 1.2;
    margin-bottom: 1rem;
}

.price {
    font-size: 18px;
    margin-bottom: 1.5rem;
}

.price span {
    color: #f5b400;
    font-weight: bold;
}

/* BUTTON */
.btn {
    background:#f5b400;
    color: white;
    padding: 0.3rem 1rem;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    font-weight: 600;
}

.btn:hover {
    background: #f5b400;
}

/* IMAGE */
.image img {
    max-height: 280px;
    object-fit: contain;
}
</style>
