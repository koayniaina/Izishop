<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import AuthLayout from '../../Layouts/Auth.vue'
import { route } from 'ziggy-js'
import { Mail, Lock } from 'lucide-vue-next'

const form = useForm({
    email: '',
    password: '',
    remember: false, // ajout du champ Remember Me
})

const submit = () => {
    form.post(route('page.login'), {
        onError: () => {
            form.reset('password')
        },
    })
}
</script>

<template>
<AuthLayout>
    <div class="auth-card">
       
        <div  class="text-center mb-2">
            <h2 class="title">Welcom back egain</h2>
            <p>It's your account</p>
        </div>
        <form @submit.prevent="submit">

            <!-- Email -->
            <div class="field">
                <div class="input-wrapper" :class="{'error-border': form.errors.email}">
                    <Mail class="icon"/>
                    <input type="email" v-model="form.email" placeholder="Email" />
                </div>
                <div v-if="form.errors.email" class="error-message">
                    {{ form.errors.email }}
                </div>
            </div>

            <!-- Password -->
            <div class="field">
                <div class="input-wrapper" :class="{'error-border': form.errors.password}">
                    <Lock class="icon"/>
                    <input type="password" v-model="form.password" placeholder="Password" />
                </div>
                <div v-if="form.errors.password" class="error-message">
                    {{ form.errors.password }}
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex justify-between items-center mb-4">
                <label class="flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" v-model="form.remember" />
                    Remember Me
                </label>
                <Link href="/forgot-password" class="text-sm ">
                    Forgot Password?
                </Link>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn" :disabled="form.processing">
                Login
            </button>
        </form>
    </div>
</AuthLayout>
</template>

<style scoped>
/* Carte */
.auth-card {
    width: 100%;
    max-width: 450px;
    margin: 4rem auto;
    /* position: relative; */
}

.home{
    position: absolute;
}

/* Titre */
.title {
    font-size: 1.25rem;
    font-weight: 700;
    /* margin-bottom: .9rem; */
    color: #111827;
}

/* Champs */
.field {
    margin-bottom: 1rem;
}

.input-wrapper {
    display: flex;
    align-items: center;
    border: 1px solid #e5e7eb;
    border-radius: 4px;
    padding: 0.4rem 0.75rem;
    /* background: #f9fafb; */
    /* transition: border-color 0.3s, box-shadow 0.3s; */
}

.input-wrapper:hover {
    border-color: #F5BE4B;
    box-shadow: 0 0 10px rgba(249,115,22,0.2);
}

.text-sm {
    color: #F5BE4B;
}

.input-wrapper input {
    border: none;
    outline: none;
    width: 100%;
    padding-left: 0.5rem;
    background: transparent;
}

.icon {
    width: 20px;
    height: 20px;
    color: #9ca3af;
}

/* Bordure d’erreur */
.error-border {
    border-color: #da1111 !important;
}

/* Message d’erreur */
.error-message {
    color: #da1111;
    font-size: 0.85rem;
    /* margin-top: 0.25rem; */
}

/* Flex pour Remember Me et Forgot Password */
.flex {
    display: flex;
}

.justify-between {
    justify-content: space-between;
}

.items-center {
    align-items: center;
}

.text-sm {
    font-size: 0.875rem;
}

.text-gray-700 {
    color: #374151;
}

.text-orange-500 {
    color: #F5BE4B;
}

.hover\:underline:hover {
    text-decoration: underline;
}

.gap-2 {
    gap: 0.5rem;
}

.mb-4 {
    margin-bottom: 1rem;
}

/* Bouton */
.btn {
    width: 100%;
    background: #F5BE4B;
    color: white;
    padding: 0.5rem;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    font-weight: 700;
    font-size: 1rem;
    transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
