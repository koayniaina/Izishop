<template>
    <h2>Create Product</h2>

    <form @submit.prevent="createProduct" enctype="multipart/form-data">
        <div>
            <input type="text" v-model="form.title" placeholder="Title">
            <div v-if="form.errors.title" class="error">{{ form.errors.title }}</div>
        </div>

        <div>
            <textarea v-model="form.description" placeholder="Description"></textarea>
            <div v-if="form.errors.description" class="error">{{ form.errors.description }}</div>
        </div>

        <div>
            <input type="number" v-model="form.price" placeholder="Price">
            <div v-if="form.errors.price" class="error">{{ form.errors.price }}</div>
        </div>

        <div>
            <input type="file" @change="handleImage">
            <div v-if="form.errors.image" class="error">{{ form.errors.image }}</div>
        </div>

        <button type="submit" :disabled="form.processing">
           Create
        </button>
    </form>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const form = useForm({
    title: '',
    description: '',
    price: '',
    image: null,
})


const handleImage = (event) => {
    form.image = event.target.files[0] 
}

const createProduct = () => {
    form.post(route('posts.store'), {
        forceFormData: true,
        onError: (errors) => {
            console.log('Validation errors:', errors)
        }
    })
}
</script>

<style>
.error {
    color: red;
    font-size: 0.9rem;
}
</style>
