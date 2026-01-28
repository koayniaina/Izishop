<script setup lang="ts">
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import {
  Box,
  Zap,
  Shield,
  Droplet,
  SprayCan,
  Sofa,
  Leaf,
  Home,
  HardHat,
  Toolbox
} from 'lucide-vue-next'

// Toutes les catégories
const categories = [
  { name: "Flooring & Surfaces", slug: "flooring", icon: Box },
  { name: "Electrical & Lighting ", slug: "electrical", icon: Zap },
  { name: "Hardware & Safety", slug: "hardware", icon: Shield },
  { name: "Plumbing & Sanitary", slug: "plumbing", icon: Droplet },
  { name: "Paints & Sealants", slug: "paint", icon: SprayCan },
  { name: "Furniture & Interior", slug: "furniture", icon: Sofa },
  { name: "Gardening & Landscaping", slug: "gardening", icon: Leaf },
  { name: "Roofing & Waterproofing", slug: "roofing", icon: Home },
  { name: "Construction Machinery", slug: "machinery", icon: HardHat },
  { name: "DIY & Miscellaneous", slug: "diy", icon: Toolbox },
]

// Ref du conteneur scrollable
const scrollContainer = ref<HTMLElement | null>(null)

// Fonction pour scroll à gauche
const scrollLeft = () => {
  if (scrollContainer.value) {
    scrollContainer.value.scrollBy({ left: -800, behavior: 'smooth' })
  }
}

// Fonction pour scroll à droite
const scrollRight = () => {
  if (scrollContainer.value) {
    scrollContainer.value.scrollBy({ left: 800, behavior: 'smooth' })
  }
}
</script>

<template>
  <div class="category-carousel">
    <h2>Shop By Category</h2>

    <div class="relative  slider">
      <!-- Bouton gauche -->
      <button
        @click="scrollLeft"
        class="absolute top-1/2 left-0 -translate-y-1/2 bg-white shadow rounded-full p-2 cursor-pointer z-10"
      >
        &lt;
      </button>

      <!-- Contenu scrollable -->
      <div
        ref="scrollContainer"
        class="flex gap-4 overflow-x-auto px-2 scrollbar-hide scroll-smooth py-2"
      >
        <Link
          v-for="cat in categories"
          :key="cat.slug"
          :href="`/category/${cat.slug}`"
          class="category-card flex-shrink-0 w-40 sm:w-32 md:w-36 "
        >
          <div class="icon-wrapper">
            <component :is="cat.icon" class="category-icon" />
          </div>
          <p>{{ cat.name }}</p>
        </Link>
      </div>

      <!-- Bouton droit -->
      <button
        @click="scrollRight"
        class="absolute top-1/2 right-0 -translate-y-1/2 bg-white shadow rounded-full p-2 cursor-pointer z-10 hover:bg-gray-100"
      >
        &gt;
      </button>
    </div>
  </div>
</template>

<style scoped>
.category-carousel h2 {
  text-align: center;
  font-weight: 600;
  text-transform: uppercase;
  color: #000;
  margin: 1rem 0;
  /* margin-bottom: 2rem; */
  font-size: 1rem;
  position: relative;
}

.slider{
    max-width: 800px;
    width: 100%;
    margin: 0 auto;
}

.category-carousel h2::before {
  content: "";
  position: absolute;
  width: 80px;
  height: 2px;
  background: #f5b400;
  top: 22px;
  left: 50%;
  transform: translateX(-50%);
}
.category-card {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  cursor: pointer;
  transition: transform 0.3s;
}

.icon-wrapper {
  width: 140px;
  height: 50px;
  /* border-radius: 50%; */
  /* background: #f0f0f0; */
  display: flex;
  justify-content: center;
  align-items: center;
  /* margin-bottom: 0.8rem; */
  transition: transform 0.3s;
}

.category-card:hover .icon-wrapper {
  transform: scale(1.1);
}

.category-icon {
  width: 30px;
  height: 30px;
  color: #333;
}

.category-card p {
  font-weight: 500;
  font-size: 0.7rem;
  /* margin-top: .3rem; */
  text-align: center;
  color: #333;
}

/* Scroll smooth */
.scroll-smooth {
  scroll-behavior: smooth;
}

/* Masquer scrollbar */
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>
