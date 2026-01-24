<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

</script>

<template>
    <div>
         <Link :href="route('page.home')" class="home">Go Back</Link>
    </div>
    <nav>
        <Link :href="route('page.login')">Login</Link>
        <Link :href="route('page.register')">Register</Link>
    </nav>
    <section>
        <slot/>
    </section>
</template>

<style scoped>
    nav{
        background-color:#0f172a;
        padding: 1rem;
        justify-content: center;
        display: flex;
        /* position: relative; */
        gap: 2rem;
        color: white;
        position: relative;
        font-size: 1.2rem;
        font-weight: 600;
    }

    section{
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 50vh; */
        border-top: 2px solid #F5BE4B;
    }

    nav a:hover{
        color: #F5BE4B;
    }

.home{
    position: absolute;
    top: 56px;
    margin: 1rem;
    padding: .2rem 1rem;
    border-radius: 4px;
    border: 1px solid #000000;
}
</style>
