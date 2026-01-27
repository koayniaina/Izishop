<script setup lang="ts">
import AppLayout from '../Layouts/App.vue'
import HeroBanner from './HeroBanner.vue'
import ServiceBar from '../components/ServiceBar.vue'
import Posts from './Posts.vue'
import Category from '../components/Category.vue';
// import { defineProps } from 'vue'

// Props envoyées par Laravel/Inertia
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
    <HeroBanner />
    <Category/>
    <Posts :posts="props.posts"/>
    <ServiceBar />
  </AppLayout>
</template>
