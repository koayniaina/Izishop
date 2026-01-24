<script setup>
import { useForm } from "@inertiajs/vue3";
import AuthLayout from '../../Layouts/Auth.vue'
import { Mail, Lock, User } from 'lucide-vue-next'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post("/register", {
        onError: () => form.reset("password", "password_confirmation"),
    })
}
</script>

<template>
<AuthLayout>
    <div class="auth-card">
        <div  class="text-center mb-2">
            <h2 class="title">Create your account</h2>
            <p>it's free end easy</p>
        </div>

        <form @submit.prevent="submit">

            <!-- Name + Email -->
            <div class="field-row">
                <!-- Name -->
                <div class="field half">
                    <div class="input-wrapper" :class="{ 'error-border': form.errors.name }">
                        <User class="icon" />
                        <input
                            type="text"
                            v-model="form.name"
                            placeholder="Name"
                        />
                    </div>
                    <div v-if="form.errors.name" class="error-message">
                        {{ form.errors.name }}
                    </div>
                </div>

                <!-- Email -->
                <div class="field half">
                    <div class="input-wrapper" :class="{ 'error-border': form.errors.email }">
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
            </div>

            <!-- Password -->
            <div class="field">
                <div class="input-wrapper" :class="{ 'error-border': form.errors.password }">
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

            <!-- Confirm Password -->
            <div class="field">
                <div class="input-wrapper" :class="{ 'error-border': form.errors.password_confirmation }">
                    <Lock class="icon" />
                    <input
                        type="password"
                        v-model="form.password_confirmation"
                        placeholder="Confirm Password"
                    />
                </div>
                <div v-if="form.errors.password_confirmation" class="error-message">
                    {{ form.errors.password_confirmation }}
                </div>
            </div>

            <!-- Button -->
            <button type="submit" class="btn" :disabled="form.processing">
                Register
            </button>

        </form>
    </div>
</AuthLayout>
</template>

<style scoped>
/* Card */
.auth-card {
    width: 100%;
    max-width: 450px;
    margin: 4rem auto;
}

/* Title */
.title {
    font-size: 1.25rem;
    font-weight: 700;
    /* margin-bottom: 1rem; */
    color: #111827;
}

/* Fields */
.field {
    margin-bottom: 1rem;
}

/* Flex row */
.field-row {
    display: flex;
    gap: 1rem;
}

.half {
    flex: 1;
}

/* Input wrapper */
.input-wrapper {
    display: flex;
    align-items: center;
    border: 1px solid #e5e7eb;
    border-radius: 4px;
    padding: 0.4rem 0.75rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.input-wrapper:hover {
    border-color: #F5BE4B;
    box-shadow: 0 0 8px rgba(245,190,75,0.3);
}

.input-wrapper input {
    border: none;
    outline: none;
    width: 100%;
    padding-left: 0.5rem;
    background: transparent;
}

/* Icons */
.icon {
    width: 20px;
    height: 20px;
    color: #9ca3af;
}

/* Errors */
.error-border {
    border-color: #da1111 !important;
}

.error-message {
    color: #da1111;
    font-size: 0.85rem;
    margin-top: 0.25rem;
}

/* Button */
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
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Responsive */
@media (max-width: 640px) {
    .field-row {
        flex-direction: column;
    }
}
</style>
