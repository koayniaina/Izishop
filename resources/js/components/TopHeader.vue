<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import IconHeader from './IconHeader.vue';
import { Search } from 'lucide-vue-next';
import BottonHeader from './BottonHeader.vue';
</script>

<template>
  <main>
    <nav>
      <!-- Logo / nom du site -->

      <span class="logo">
        <Link :href="route('page.home')">
            <h2 class="font-medium">Izzishop.</h2>
        </Link>
      </span>

      <!-- Partie droite : recherche + icônes -->
      <span class="allRight">
        <!-- Barre de recherche -->
        <div class="search">
          <input type="search" placeholder="Search product" />
          <button class="searchButton">
            <Search :size="14" color="white" />
          </button>
        </div>

        <!-- IconHeader -->
        <IconHeader />
      </span>
    </nav>
    <section>
        <BottonHeader/>
    </section>
  </main>
</template>

<style scoped>

main{
    background-color: #f5b400;
    position: sticky;
    z-index: 20;
    top: 0;
}

section{
    padding: .4rem 2rem;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
  border-bottom: 1px solid rgba(0, 0, 0, 0.5);
}


.font-medium {
  font-size: 1.3rem;
}

.allRight {
  display: flex;
  align-items: center;
  gap: 2rem;
}


.search {
  display: flex;
  align-items: center;
  border-right: 1px solid rgb(0, 0, 0);
  border-bottom: 0;
  border-top: 0;
  border-left: 0;
  /* padding: .2rem; */
  border-radius: 60px;
  overflow: hidden;
  background-color: white;
  width: 500px;
}


.search input {
  border: none;
  outline: none;
  flex: 1;
  padding: 0 1rem;
  font-size: 0.9rem;
}

.searchButton {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: black;
  padding: .8rem;
  cursor: pointer;
  border: none;
}

/* Ajustement pour IconHeader */
.allRight > * {
  display: flex;
  align-items: center;
}
</style>
