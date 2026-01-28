<script setup>
import { usePage, router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const user = usePage().props.auth.user

const logout = () => {
    router.post('logout')
}
</script>

<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Profile User</h1>
           <p><strong>Name:</strong> {{ user.name }}</p>
        <button
            class="mt-4 px-4 py-2 bg-red-500 text-white rounded"
            @click="logout"
        >
            Logout
        </button>
    </div>
</template>