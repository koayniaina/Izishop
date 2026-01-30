<script setup>
import { useForm } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/Auth.vue";
import { Mail, Lock, User, ArrowLeft } from "lucide-vue-next";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post("/register", {
        onError: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <AuthLayout>
        <div class="auth-card">
            <div class="mb-4">
                <h2 class="title">Create your account</h2>
                <p class="text-center text-uppercase text-gray-500">
                    it's free end easy
                </p>
            </div>

            <form @submit.prevent="submit">
                <!-- Name + Email -->
                <div class="field-row">
                    <!-- Name -->
                    <div class="field half">
                        <div
                            class="input-wrapper"
                            :class="{ 'error-border': form.errors.name }"
                        >
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

                <!-- Confirm Password -->
                <div class="field">
                    <div
                        class="input-wrapper"
                        :class="{
                            'error-border': form.errors.password_confirmation,
                        }"
                    >
                        <Lock class="icon" />
                        <input
                            type="password"
                            v-model="form.password_confirmation"
                            placeholder="Confirm Password"
                        />
                    </div>
                    <div
                        v-if="form.errors.password_confirmation"
                        class="error-message"
                    >
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
    max-width: 550px;
    position: relative;
    background-color: #ffffff;
    margin: 3rem auto;
    /* color: #ffffff; */
    padding: 2rem;
    /* border-radius: 5px; */
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
/* Title */
.title {
    font-size: 1.2rem;
    font-weight: 700;
    text-transform: uppercase;
}

.text-uppercase {
    text-transform: uppercase;
    font-size: 0.8rem;
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
    border: 1px solid #636363;
    border-radius: 5px;
    padding: 0.45rem 0.75rem;
}

.input-wrapper input {
    border: none;
    outline: none;
    width: 100%;
    color: #111827;
    padding-left: 0.5rem;
    background: transparent;
}

/* Icons */
.icon {
    width: 18px;
    height: 18px;
    color: #000000;
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
    background: #000000;
    color: white;
    padding: 0.5rem;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-weight: 700;
    font-size: 1rem;
    text-transform: uppercase;
}

/* Responsive */
@media (max-width: 640px) {
    .field-row {
        flex-direction: column;
    }
}
</style>
