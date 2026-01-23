<script setup>
import { useForm } from '@inertiajs/vue3';


const form = useForm({
  email: '',
  password: ''
});

function submit() {
  form.post('/login');
}
</script>

<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow rounded">
    <h1 class="text-2xl font-bold mb-4">Login</h1>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block mb-1" for="email">Email</label>
        <input
          v-model="form.email"
          type="email"
          id="email"
          class="w-full border rounded px-3 py-2"
        />
      </div>

      <div class="mb-4">
        <label class="block mb-1" for="password">Password</label>
        <input
          v-model="form.password"
          type="password"
          id="password"
          class="w-full border rounded px-3 py-2"
        />
      </div>

      <button
        type="submit"
        class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600"
        :disabled="form.processing"
      >
        Login
      </button>
    </form>
  </div>
</template>
