<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { TextAlignEnd } from 'lucide-vue-next';
import { route } from 'ziggy-js';

// Définir les menus comme des tableaux d'objets
const mainLinks = [
  { name: 'Home', routeName: 'page.home' },
  { name: 'Product', routeName: 'page.home' },
  { name: 'Blog', routeName: 'page.home' },
];

const secondaryLinks = [
  { name: 'Deal of the Day', routeName: 'page.home' },
  { name: 'Best Sellers', routeName: 'page.home' },
  { name: 'New Arrival', routeName: 'page.home' },
];
</script>

<template>
  <div class="main">
    <!-- Header -->
     <div class="section">
         <div class="flex items-center gap-2">
             <TextAlignEnd :size="18"/>
           <span>Browser Category</span>
         </div>

         <!-- Menu principal -->
         <nav class="NavLink flex gap-4 my-2">
           <span v-for="link in mainLinks" :key="link.name">
             <Link :href="route(link.routeName)">{{ link.name }}</Link>
           </span>
         </nav>
     </div>

    <!-- Menu secondaire -->
     <div>
         <nav class="NavLink flex gap-4 my-2">
           <span v-for="link in secondaryLinks" :key="link.name">
             <Link :href="route(link.routeName)">{{ link.name }}</Link>
           </span>
         </nav>
     </div>
  </div>
</template>

<style scoped>
.NavLink span {
  cursor: pointer;
}

.main{
    display: flex;
    align-items: center;
    font-size: .8rem;
    justify-content: space-between;
}

.section{
     display: flex;
    align-items: center;
    gap: 2rem;
    justify-content: space-between;
}
</style>
