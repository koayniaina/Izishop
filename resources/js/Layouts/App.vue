<script setup>
import Footer from "../components/Footer.vue";
import TopHeader from "../components/TopHeader.vue";
</script>

<template>
    <main>
        <TopHeader />
        <section>
            <slot />
        </section>
        <footer>
            <Footer />
        </footer>
    </main>
</template>

