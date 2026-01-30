<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/Auth.vue";
import { route } from "ziggy-js";
import { Mail, Lock, ArrowLeft } from "lucide-vue-next";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("page.login"), {
        onError: () => {
            form.reset("password");
        },
    });
};
</script>

<template>
    <AuthLayout>
        <div class="auth-card">
            <p class="button">
                <ArrowLeft :size="15" />
                <Link :href="route('page.home')" class="home">Go Back</Link>
            </p>
            <div class="mb-4">
                <h2 class="title">Welcom back egain</h2>
                <p class="text-center text-uppercase text-gray-500">
                    It's your account
                </p>
            </div>
            <form @submit.prevent="submit">
                <!-- Email -->
                <div class="field">
                    <div
                        class="input-wrapper"
                        :class="{ 'error-border': form.errors.email }"
                    >
                        <Mail class="icon" />
                        <input
                            type="email"
                            v-model="form.email"
                            placeholder="Email"
                        />
                    </div>
                    <div v-if="form.errors.email" class="error-message">
                        {{ form.errors.email }}
                    </div>
                </div>

                <!-- Password -->
                <div class="field">
                    <div
                        class="input-wrapper"
                        :class="{ 'error-border': form.errors.password }"
                    >
                        <Lock class="icon" />
                        <input
                            type="password"
                            v-model="form.password"
                            placeholder="Password"
                        />
                    </div>
                    <div v-if="form.errors.password" class="error-message">
                        {{ form.errors.password }}
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex justify-between items-center mb-4">
                    <label
                        class="flex items-center gap-2 text-sm text-gray-700"
                    >
                        <input type="checkbox" v-model="form.remember" />
                        Remember Me
                    </label>
                    <Link href="/forgot-password" class="text-sm">
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
.auth-card {
    position: relative;
    width: 100%;
    max-width: 550px;
    background-color: #ffffff;
    margin: 3rem auto;
    color: #111827;
    padding: 2rem;
    /* border-radius: 5px; */
}

/* =========================
   Titres
========================= */
.title {
    font-size: 1.2rem;
    font-weight: 700;
    text-transform: uppercase;
}

.button{
    display: flex;
    /* border: 1px solid black; */
    gap: .2rem;
    position: absolute;
    right: 0;
    align-items: center;
    /* padding: .3rem 1rem; */
    width: 125px;
    border-radius: 5px;
}

.text-uppercase {
    text-transform: uppercase;
    font-size: 0.8rem;
}

/* =========================
   Champs
========================= */
.field {
    margin-bottom: 1rem;
}

.input-wrapper {
    display: flex;
    align-items: center;
    border: 1px solid #636363;
    border-radius: 5px;
    padding: 0.45rem 0.75rem;
    /* background: #fff; */
    /* transition: border-color 0.3s ease, box-shadow 0.3s ease; */
}

.input-wrapper input {
    border: none;
    outline: none;
    width: 100%;
    padding-left: 0.5rem;
    background: transparent;
    font-size: 0.95rem;
    color: #111827;
}

/* =========================
   Icônes
========================= */
.icon {
    width: 18px;
    height: 18px;
    color: #000000;
}

/* =========================
   Erreurs
========================= */
.error-border {
    border-color: #da1111 !important;
}

.error-message {
    color: #da1111;
    font-size: 0.85rem;
    margin-top: 0.25rem;
}

/* =========================
   Layout utilitaire
========================= */
.flex {
    display: flex;
}

.justify-between {
    justify-content: space-between;
}

.items-center {
    align-items: center;
}

.gap-2 {
    gap: 0.5rem;
}

.mb-4 {
    margin-bottom: 1rem;
}

/* =========================
   Textes
========================= */
.text-sm {
    font-size: 0.875rem;
}

.text-gray {
    color: #374151;
}

.text-primary {
    color: #f5be4b;
}

.text-primary:hover {
    text-decoration: underline;
}

/* =========================
   Bouton
========================= */
.btn {
    width: 100%;
    background: #000000;
    color: #ffffff;
    padding: 0.55rem;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-weight: 700;
    font-size: 1rem;
    text-transform: uppercase;
    /* transition: background 0.25s ease, transform 0.15s ease, box-shadow 0.15s ease; */
}

@media (max-width: 640px) {
    .field-row {
        flex-direction: column;
    }
}
</style>
