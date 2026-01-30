<script setup lang="ts">
import AppLayout from '../Layouts/App.vue'
import HeroBanner from './HeroBanner.vue'
import ServiceBar from '../components/ServiceBar.vue'
import Posts from './Posts.vue'
import Category from '../components/Category.vue';
import { Mail } from 'lucide-vue-next';

const props = defineProps<{
  posts: Array<{
    id: number,
    title: string,
    description: string | null,
    price: number,
    image: string | null
  }>
}>()
</script>

<template>
  <AppLayout>
    <div>
        <HeroBanner />
        <Category/>
        <Posts :posts="props.posts"/>
        <ServiceBar />
    </div>
    <main class="message">
        <Mail />
    </main>
  </AppLayout>
</template>


<style>
.message{
    position:fixed;
    padding: 1rem;
    border-radius: 50%;
    right: 0;
    bottom: 0;
    margin: 1rem;
    color: beige;
    z-index: 100;
    cursor: pointer;
    background-color: #25D366;
}
</style>
