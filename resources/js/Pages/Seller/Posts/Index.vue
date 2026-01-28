<script setup lang="ts">
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

// Props
const props = defineProps<{ posts: Array<{ id: number, title: string, description: string|null, price: number, image: string|null }> }>()
const posts = ref([...props.posts])

// Supprimer un post
const deletePost = (id: number) => {
  if (confirm('Are you sure you want to delete this post?')) {
    router.delete(route('posts.destroy', id), {
      onSuccess: () => posts.value = posts.value.filter(p => p.id !== id),
      onError: (errors) => console.error(errors),
    })
  }
}
</script>

<template>
  <div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">All Posts</h2>

    <div class="mb-4">
      <Link :href="route('posts.create')" class="btn btn-primary">Create Post</Link>
    </div>

    <table class="table-auto border-collapse border border-gray-300 w-full">
      <thead>
        <tr class="bg-gray-200">
          <th class="border px-4 py-2">Id</th>
          <th class="border px-4 py-2">Title</th>
          <th class="border px-4 py-2">Description</th>
          <th class="border px-4 py-2">Price</th>
          <th class="border px-4 py-2">Image</th>
          <th class="border px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id" class="hover:bg-gray-100">
          <td class="border px-4 py-2">{{ post.id }}</td>
          <td class="border px-4 py-2">{{ post.title }}</td>
          <td class="border px-4 py-2">{{ post.description }}</td>
          <td class="border px-4 py-2">{{ post.price }}</td>
          <td class="border px-4 py-2">
            <img v-if="post.image" :src="`/storage/${post.image}`" class="w-20 h-20 object-cover rounded-full" />
            <span v-else class="text-gray-500">No image</span>
          </td>
          <td class="border px-4 py-2 flex gap-2">
            <Link :href="route('posts.edit', post.id)" class="btn btn-sm btn-warning">Edit</Link>
            <button @click="deletePost(post.id)" class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr>
        <tr v-if="posts.length === 0">
          <td colspan="6" class="text-center py-4">No posts found.</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style>
.btn {
  padding: 0.4rem 0.8rem;
  border-radius: 0.25rem;
  cursor: pointer;
  color: white;
  text-decoration: none;
}
.btn-primary { background-color: #2563eb; }
.btn-warning { background-color: #f59e0b; }
.btn-danger { background-color: #dc2626; }
.btn-sm { font-size: 0.8rem; padding: 0.2rem 0.5rem; }
</style>
