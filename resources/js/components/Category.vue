<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import {
  Box,
  Hammer,
  Shield,
  Sofa
} from 'lucide-vue-next' // Lucide icons

// Each category now has an icon instead of an image
const categories = [
  { name: "Materials", slug: "materials", icon: Box },
  { name: "Equipment & Tools", slug: "equipment", icon: Hammer }, // changed Tool → Hammer
  { name: "Safety Equipment", slug: "safety", icon: Shield },
  { name: "Furniture & Management", slug: "furniture", icon: Sofa }
]
</script>

<template>
  <div class="category">
    <h2>Shop By Category</h2>

    <div class="category-grid">
      <Link
        v-for="cat in categories"
        :key="cat.slug"
        :href="`/category/${cat.slug}`"
        class="category-card"
      >
        <!-- Icon goes here -->
        <div class="icon-wrapper">
          <component :is="cat.icon" class="category-icon" />
        </div>

        <!-- Category name -->
        <p>{{ cat.name }}</p>
      </Link>
    </div>
  </div>
</template>

<style scoped>

.category h2 {
  color: #000000;
  text-align: center;
  position: relative;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 1rem;
  margin: 2rem 0;
}

.category h2::before{
    content: "";
    top: 23px;
    width: 100px;
    margin: 0 2rem;
    /* display: flex; */
    /* justify-content: center; */
    height: 2px;
    background-color: #f5b400;
    position: absolute;
}



/* Grid layout */
.category-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
  gap: 2rem;
  justify-items: center;
  padding: 0 1rem;
}

/* Card style */
.category-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  cursor: pointer;
  transition: transform 0.3s, box-shadow 0.3s;
}


/* Icon wrapper (where icon is placed) */
.icon-wrapper {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #f0f0f0;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 0.8rem;
  transition: transform 0.3s;
}

.category-card:hover .icon-wrapper {
  transform: scale(1.1);
}

/* Icon style */
.category-icon {
  width: 30px;
  height: 30px;
  color: #333;
}

/* Text */
.category-card p {
  font-weight: 500;
  font-size: 1rem;
  color: #333;
  text-align: center;
}
</style>
