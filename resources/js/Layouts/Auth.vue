<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowLeft } from 'lucide-vue-next';
import { route } from 'ziggy-js';

</script>

<template>
    <main>
        <header>

            <nav>
                <Link :href="route('page.login')">Sign In</Link>
                <Link :href="route('page.register')">Sign Up</Link>
            </nav>
        </header>
        <section>
            <slot/>
        </section>
    </main>
</template>

<style scoped>
    main{
        background-color:#0f172a;
        /* font-weight: .8rem; */
        min-height: 100vh;
    }

    header{
        justify-content: center;
        display: flex;
        padding:1rem 2rem;
        color: white;
        position: relative;

    }

    section{
        display: flex;
        justify-content: center;
        align-items: center;
        border-top: 1px solid #283044;
    }

    button{
        display: flex;
        align-items: center;
        gap: .2rem;
        background-color: #283044;
        padding: .3rem 1rem;
        border-radius: 5px;
    }

    nav{
        display: flex;
        gap: 1rem;
    }

    nav a{
        border: 1px solid rgb(75, 75, 75);
        padding: .3rem 1rem;
        font-size: .9rem;
        text-transform: uppercase;
        border-radius: 5px;
    }

</style>
