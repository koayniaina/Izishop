<script setup>
import TopHeader from "../components/TopHeader.vue";
</script>

<template>
    <main>
        <TopHeader />
        <sction>
            <slot />
        </sction>
    </main>
</template>

