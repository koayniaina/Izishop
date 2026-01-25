<template>
  <div class="icon-header">
    
    <div
      class="addIcon"
      v-for="(item, index) in iconList"
      :key="index"
    >

      <span class="iconWrapper">
        <template v-if="item.routeName">
          <Link :href="route(item.routeName)" class="iconLink">
            <component :is="item.icon" :size="12" />
          </Link>
        </template>
        <template v-else>
          <component :is="item.icon" :size="12" />
        </template>
      </span>

      <!-- Texte à côté de l'icône -->
      <span class="textWrapper">
        <p class="textIcon">{{ item.title }}</p>
        <h2 class="textTag">{{ item.value }}</h2>
      </span>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { Phone, Heart, User, ShoppingCart } from 'lucide-vue-next';

import { route } from 'ziggy-js';

const iconList = [
  { icon: Phone, title: 'contact', value: '(262)555 123 096' },
//   { icon: Heart, title: 'favorite', value: 'My items' },
  { icon: User, title: 'sign In', value: 'Account', routeName: 'page.login' },
  { icon: ShoppingCart, title: 'cart', value: 'Total', routeName: 'page.cart' },
];
</script>

<style scoped>
.icon-header {
  display: flex;
  align-items: center;
  gap: 2rem;
}

.addIcon {
  display: flex;
  align-items: center; /* icône et texte sur la même ligne */
  gap: 0.5rem;
  cursor: pointer;
}

.iconWrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid rgba(0, 0, 0, 0.836);
  border-radius: 50%;
  height: 30px;
  width: 30px;
  transition: all 0.3s ease;
}

.iconWrapper:hover {
  background-color: black;
  color: whitesmoke;
}

.iconLink {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

.textWrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.textIcon {
  font-size: 0.65rem;
  margin: 0;
}

.textTag {
  font-size: 0.8rem;
  font-weight: 500;
  margin: 0;
  text-decoration: none;
  color: inherit;
}
</style>
