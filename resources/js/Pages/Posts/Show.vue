<script setup lang="ts">
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const props = defineProps<{
  post: {
    id: number,
    title: string,
    description: string | null,
    price: number,
    image: string | null
  }
}>()
</script>

<template>
  <div class="container mx-auto p-6">
    <Link :href="route('page.home')" class="btn btn-secondary mb-4">View Post</Link>

    <h1 class="text-3xl font-bold mb-4">{{ post.title }}</h1>
    <p class="text-gray-700 mb-2">{{ post.description }}</p>
    <p class="font-bold mb-4">Price: ${{ post.price }}</p>

    <img
      v-if="post.image"
      :src="`/storage/${post.image}`"
      class="w-full max-w-md object-cover rounded"
    />
    <div v-else class="w-full max-w-md h-64 bg-gray-200 flex items-center justify-center rounded">
      No image
    </div>
  </div>
</template>

<style scoped>
.btn {
  padding: 0.4rem 0.8rem;
  border-radius: 0.25rem;
  color: white;
  background-color: #2563eb;
  text-decoration: none;
}
</style>
