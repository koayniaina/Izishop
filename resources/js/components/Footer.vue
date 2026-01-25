<template>
    <footer class="footer">
        <!-- Newsletter -->
        <div class="newsletter">
            <div class="newsletter-content">
                <Newspaper :size="40" :style="black"/>
                <div class="newsletter-text">
                    <h3>Construction Newsletter</h3>
                    <p>
                       Receive updates on construction projects, building techniques, safety standards, and industry innovations from our experts.
                    </p>
                </div>

                <form class="newsletter-form" @submit.prevent="subscribe">
                    <input
                        type="email"
                        v-model="email"
                        placeholder="Enter your professional email"
                        required
                    />
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Footer content -->
        <div class="footer-content">
            <!-- Company -->
            <div class="footer-col">
                <h2 class="logo">IZZISHOP CONSTRUCTION</h2>
                <p>
                    Izzishop Construction provides reliable building solutions from
                    foundation to finishing, with a strong commitment to
                    quality, safety, and on-time delivery.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Projects</a></li>
                    <li><a href="#">Construction Process</a></li>
                    <li><a href="#">Safety Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="footer-col">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Building Construction</a></li>
                    <li><a href="#">Structural Engineering</a></li>
                    <li><a href="#">Concrete & Masonry Works</a></li>
                    <li><a href="#">Renovation & Rehabilitation</a></li>
                    <li><a href="#">Site Supervision</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-col">
                <h4>Contact Information</h4>
                <p>📍 Antananarivo, Madagascar</p>
                <p>📧 info@apexconstruction.com</p>
                <p>📞 +261 34 12 345 67</p>
            </div>
        </div>

        <!-- Bottom -->
        <div class="footer-bottom">
            © 2026 Izzishop Construction. All Rights Reserved.
        </div>
    </footer>
</template>

<script setup>
import { Newspaper } from "lucide-vue-next";
import { ref } from "vue";

const email = ref("");

const subscribe = () => {
    alert(`Subscription successful: ${email.value}`);
    email.value = "";
};
</script>

<style scoped>
.footer {
    background: #0b0b0b;
    color: #ffffff;
    /* font-family: Arial, sans-serif; */
}

.icon{
    color: #000;
}
/* ================= NEWSLETTER ================= */
.newsletter {
    background: #f5b400;
    padding:2rem;
}

.newsletter-content {
    /* max-width: 1100px; */
    margin: auto;
    display: flex;
    /* padding: 0 0 1rem; */
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.newsletter-text {
    flex: 1;
}

.newsletter-text h3 {
    margin: 0;
    font-size: 22px;
    color: #000;
}

.newsletter-text p {
    margin-top: 6px;
    color: #222;
    line-height: 1.5;
}

/* ================= FORM ================= */
.newsletter-form {
    display: flex;
    align-items: center;
    gap: 0;
}

.newsletter-form input {
    padding: 9px;
    border: none;
    outline: none;
    color: #000;
    background-color: #fff;
    border: 1px solid rgb(255, 255, 255);
    width: 440px;
    max-width: 100%;
}

.newsletter-form button {
    background: #000;
    color: #fff;
    padding: 10px ;
    cursor: pointer;
    /* transition: background 0.3s; */
}

/* ================= FOOTER CONTENT ================= */
.footer-content {
    max-width: 1100px;
    margin:2rem auto;
    padding:9px 1rem ;

    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
}

.footer-col p {
    color: #cccccc;
    line-height: 1.6;
}

.footer-col h4 {
    margin-bottom: 15px;
    color: #f5b400;
}

.footer-col ul {
    list-style: none;
    padding: 0;
}

.footer-col ul li {
    margin-bottom: 10px;
}

.footer-col ul li a {
    color: #cccccc;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-col ul li a:hover {
    color: #f5b400;
}

.logo {
    color: #f5b400;
    margin-bottom: 10px;
}

/* ================= FOOTER BOTTOM ================= */
.footer-bottom {
    text-align: center;
    padding: 15px;
    background: #000;
    font-size: 14px;
    color: #aaaaaa;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .newsletter-content {
        flex-direction: column;
        text-align: center;
    }

    .newsletter-form {
        width: 100%;
        justify-content: center;
    }

    .newsletter-form input {
        width: 100%;
        max-width: 300px;
    }
}

</style>
