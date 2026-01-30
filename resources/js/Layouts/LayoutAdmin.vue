<script setup lang="ts">
import Header from '../components/admin/Header.vue'
</script>

<template>
  <div class="min-h-screen flex flex-col">
    <Header />
    <main>
      <slot />
    </main>
  </div>
</template>
