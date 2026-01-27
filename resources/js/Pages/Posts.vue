<script setup lang="ts">

import DrawerLeft from '../components/shadcn/DrawerLeft.vue';
import { ref } from 'vue';
// import { route } from 'ziggy-js';

const props = defineProps<{
  posts: Array<{
    id: number,
    title: string,
    description: string | null,
    price: number,
    image: string | null
  }>
}>()

// Pour contrôler l'ouverture du Drawer
const isDrawerOpen = ref(false);

function toggleDrawer() {
  isDrawerOpen.value = !isDrawerOpen.value;
}
</script>

<template>

  <div class="container mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">All Posts</h1>

    <div v-if="posts.length === 0" class="text-gray-500">
      No posts found.
    </div>

    <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div
        v-for="post in posts"
        :key="post.id"
        class="border rounded p-4 shadow hover:shadow-lg transition"
      >
        <img
          v-if="post.image"
          :src="`/storage/${post.image}`"
          class="w-full h-40 object-cover rounded mb-3"
          alt="Post image"
        />
        <div v-else class="w-full h-40 bg-gray-200 flex items-center justify-center rounded mb-3">
          No image
        </div>

        <h2 class="text-xl font-semibold">{{ post.title }}</h2>
        <p class="text-gray-700">{{ post.description }}</p>
        <!-- <p class="font-bold mt-2">Price: ${{ post.price }}</p> -->

        <!-- Bouton pour ouvrir le Drawer -->
        <!-- <button
          class="btn mt-3"
          @click="toggleDrawer"
        >
          View Details
        </button> -->

        <!-- Drawer -->
        <DrawerLeft v-model:open="isDrawerOpen" :post="post" />
      </div>
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
  cursor: pointer;
}
</style>
