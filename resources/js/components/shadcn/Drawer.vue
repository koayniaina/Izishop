<script setup lang="ts">
import {
  Drawer,
  DrawerClose,
  DrawerContent,
  DrawerDescription,
  DrawerHeader,
  DrawerTitle,
  DrawerTrigger,
} from '@/components/ui/drawer'

import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from '@/components/ui/accordion'

import { TextAlignEnd, X } from 'lucide-vue-next'

const categories = [
  {
    name: 'Construction Materials',
    subcategories: [
      { name: 'Wood', types: ['Oak', 'Pine', 'Teak', 'Meranti'] },
      { name: 'Cement', types: ['Portland', 'White', 'Fast', 'Grey'] },
      { name: 'Bricks', types: ['Red', 'White', 'Fireproof', 'Silico-calcareous'] },
      { name: 'Metal', types: ['Steel', 'Aluminium', 'Iron', 'Copper'] },
    ],
  },
  {
    name: 'Equipment & Tools',
    subcategories: [
      { name: 'Power Tools', types: ['Drill', 'Circular Saw', 'Grinder'] },
      { name: 'Hand Tools', types: ['Hammer', 'Screwdriver', 'Wrench'] },
      { name: 'Construction Equipment', types: ['Scaffold', 'Wheelbarrow', 'Tarps'] },
    ],
  },
  {
    name: 'Safety Equipment',
    subcategories: [
      { name: 'Helmets', types: ['Construction', 'Electrical', 'Chemical'] },
      { name: 'Gloves', types: ['Leather', 'Latex', 'Cut-resistant'] },
      { name: 'Goggles', types: ['UV Protection', 'Chemical', 'Welding'] },
      { name: 'Safety Shoes', types: ['Steel', 'Composite', 'PVC'] },
    ],
  },
  {
    name: 'Furniture & Interior',
    subcategories: [
      { name: 'Furniture', types: ['Table', 'Chair', 'Wardrobe'] },
      { name: 'Flooring', types: ['Parquet', 'Vinyl', 'Carpet'] },
      { name: 'Tiles', types: ['Stoneware', 'Ceramic', 'Mosaic'] },
      { name: 'Paint', types: ['Acrylic', 'Alkyd', 'Epoxy'] },
    ],
  },
]
</script>

<template>
  <Drawer direction="right" class="index">
    <DrawerTrigger>
      <TextAlignEnd :size="18" />
    </DrawerTrigger>

    <DrawerContent class="h-screen max-h-screen flex flex-col overflow-x-hidden">
      <DrawerHeader class="relative">
        <DrawerTitle>Product Categories</DrawerTitle>
        <DrawerDescription>
          Select a category to view subcategories and types.
        </DrawerDescription>

        <DrawerClose class="absolute right-3 top-3">
          <button class="p-1 rounded hover:bg-gray-200">
            <X :size="18" />
          </button>
        </DrawerClose>
      </DrawerHeader>

      <div class="p-4">
        <Accordion type="single" collapsible class="w-full">
          <AccordionItem
            v-for="(cat, catIndex) in categories"
            :key="cat.name"
            :value="`cat-${catIndex}`"
          >
            <AccordionTrigger>{{ cat.name }}</AccordionTrigger>
            <AccordionContent>
              <!-- Second level: Subcategories -->
              <Accordion type="single" collapsible class="w-full ml-4">
                <AccordionItem
                  v-for="(sub, subIndex) in cat.subcategories"
                  :key="sub.name"
                  :value="`sub-${catIndex}-${subIndex}`"
                >
                  <AccordionTrigger>{{ sub.name }}</AccordionTrigger>
                  <AccordionContent>
                    <!-- Third level: Types -->
                    <ul class="ml-4">
                      <li
                        v-for="type in sub.types"
                        :key="type"
                        class="px-2 py-1 hover:bg-gray-100 cursor-pointer rounded"
                      >
                        {{ type }}
                      </li>
                    </ul>
                  </AccordionContent>
                </AccordionItem>
              </Accordion>
            </AccordionContent>
          </AccordionItem>
        </Accordion>
      </div>
    </DrawerContent>
  </Drawer>
</template>

<style scoped>
.index{
    z-index: 2000;
}

ul {
  padding-left: 0;
  margin: 0;
}
li {
  list-style: none;
}
</style>
