<script setup lang="ts">
import { useForm, Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const props = defineProps<{
  post: {
    id: number
    title: string
    description: string | null
    price: number
    image: string | null
  }
}>()

// 🔥 _method DOIT ÊTRE ICI
const form = useForm({
  _method: 'put',
  title: props.post.title ?? '',
  description: props.post.description ?? '',
  price: Number(props.post.price),
  image: null as File | null,
})

const handleImageChange = (e: Event) => {
  const input = e.target as HTMLInputElement
  if (input.files && input.files.length > 0) {
    form.image = input.files[0]
  }
}

const submit = () => {
  form.post(route('posts.update', props.post.id), {
    forceFormData: true,
  })
}
</script>

<template>
  <div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Post</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label>Title</label>
        <input v-model="form.title" type="text" class="input" />
        <p v-if="form.errors.title" class="error">{{ form.errors.title }}</p>
      </div>

      <div>
        <label>Description</label>
        <textarea v-model="form.description" class="input"></textarea>
      </div>

      <div>
        <label>Price</label>
        <input
          v-model.number="form.price"
          type="number"
          step="0.01"
          class="input"
        />
        <p v-if="form.errors.price" class="error">{{ form.errors.price }}</p>
      </div>

      <div v-if="post.image">
        <label>Current Image</label>
        <img
          :src="`/storage/${post.image}`"
          class="w-24 h-24 object-cover rounded"
        />
      </div>

      <div>
        <label>Change Image</label>
        <input type="file" accept="image/*" @change="handleImageChange" />
        <p v-if="form.errors.image" class="error">{{ form.errors.image }}</p>
      </div>

      <div class="flex gap-3 pt-4">
        <button class="btn btn-primary" :disabled="form.processing">
          Update
        </button>
        <Link :href="route('posts.index')" class="btn btn-secondary">
          Cancel
        </Link>
      </div>
    </form>
  </div>
</template>

<style scoped>
.input {
  width: 100%;
  border: 1px solid #d1d5db;
  padding: 0.5rem;
  border-radius: 0.375rem;
}
.error {
  color: #dc2626;
  font-size: 0.875rem;
}
.btn {
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  color: white;
}
.btn-primary {
  background: #2563eb;
}
.btn-secondary {
  background: #6b7280;
}
</style>
