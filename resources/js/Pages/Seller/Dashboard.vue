<script setup>
import { usePage, router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import Index from './Posts/Index.vue'

const { auth, posts } = usePage().props

const logout = () => {
  router.post(route('logout'))
}
</script>

<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Seller Dashboard</h1>

    <p class="mb-6">
      <strong>Name:</strong> {{ auth.user.name }}
    </p>

    <!-- ✅ PASSAGE DE LA PROP -->
    <Index :posts="posts" />

    <button
      class="mt-6 px-4 py-2 bg-red-500 text-white rounded"
      @click="logout"
    >
      Logout
    </button>
  </div>
</template>
