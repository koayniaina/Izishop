<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import Drawer from './shadcn/Drawer.vue';


const secondaryLinks = [
  { name: 'Deal of the Day', routeName: 'page.deals' },
  { name: 'Best Sellers', routeName: 'page.sellers' },
   { name: 'Hot Deals', routeName: 'page.hotdeals' },
  { name: 'New Arrival', routeName: 'page.arrival' },

];
</script>

<template>
  <div class="main">
    <!-- Header -->
     <div class="section">
         <div class="flex items-center gap-2">
          <Drawer class="drawer"/>
           <span>Browser Category</span>
         </div>
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
  text-transform: uppercase;
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


    span{
        text-transform: uppercase;
    }
}

.drawer{
    cursor: pointer;
}
</style>
