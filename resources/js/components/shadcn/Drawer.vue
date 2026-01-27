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
    name: 'Flooring & Surfaces',
    subcategories: [
      { name: 'Wood', types: ['Oak', 'Pine', 'Teak', 'Meranti'] },
      { name: 'Tiles', types: ['Ceramic', 'Porcelain', 'Mosaic', 'Stoneware'] },
      { name: 'Cement & Concrete', types: ['Portland', 'White', 'Quick Set', 'Grey'] },
      { name: 'Metal Sheets', types: ['Steel', 'Aluminium', 'Copper', 'Iron'] },
    ],
  },
  {
    name: 'Electrical & Lighting',
    subcategories: [
      { name: 'Power Tools', types: ['Drill', 'Circular Saw', 'Grinder'] },
      { name: 'Hand Tools', types: ['Hammer', 'Screwdriver', 'Wrench', 'Pliers'] },
      { name: 'Electrical Supplies', types: ['Wires', 'Switches', 'Sockets', 'Circuit Breakers'] },
      { name: 'Lighting', types: ['LED', 'Pendant', 'Wall Lamp', 'Ceiling Light'] },
    ],
  },
  {
    name: 'Hardware & Safety',
    subcategories: [
      { name: 'Helmets', types: ['Construction', 'Electrical', 'Chemical'] },
      { name: 'Gloves', types: ['Leather', 'Latex', 'Cut-resistant'] },
      { name: 'Safety Glasses', types: ['UV Protection', 'Chemical', 'Welding'] },
      { name: 'Safety Shoes', types: ['Steel Toe', 'Composite', 'PVC'] },
      { name: 'Locks & Hinges', types: ['Padlock', 'Door Hinges', 'Cabinet Locks'] },
      { name: 'Fasteners', types: ['Nails', 'Screws', 'Bolts', 'Rivets'] },
    ],
  },
  {
    name: 'Plumbing & Sanitary',
    subcategories: [
      { name: 'Pipes', types: ['PVC', 'Copper', 'Galvanized', 'PEX'] },
      { name: 'Fittings', types: ['Elbows', 'T-Joints', 'Adapters', 'Couplers'] },
      { name: 'Sanitary Fixtures', types: ['Toilet', 'Sink', 'Shower', 'Bathtub'] },
      { name: 'Valves', types: ['Gate Valve', 'Ball Valve', 'Check Valve'] },
    ],
  },
  {
    name: 'Paints, Adhesives & Sealants',
    subcategories: [
      { name: 'Paints', types: ['Acrylic', 'Alkyd', 'Epoxy', 'Latex'] },
      { name: 'Primers', types: ['Wood Primer', 'Concrete Primer'] },
      { name: 'Adhesives', types: ['Construction Glue', 'Epoxy Glue', 'Tile Adhesive'] },
      { name: 'Sealants', types: ['Silicone', 'Polyurethane', 'Acrylic'] },
    ],
  },
  {
    name: 'Furniture & Interior',
    subcategories: [
      { name: 'Furniture', types: ['Sofa', 'Chair', 'Wardrobe', 'Table'] },
      { name: 'Floor Coverings', types: ['Carpet', 'Rugs', 'Vinyl', 'Parquet'] },
      { name: 'Decor Items', types: ['Vases', 'Wall Art', 'Curtains'] },
      { name: 'Lighting', types: ['Table Lamp', 'Ceiling Light', 'Wall Lamp'] },
    ],
  },
  {
    name: 'Gardening & Landscaping',
    subcategories: [
      { name: 'Garden Tools', types: ['Shovel', 'Rake', 'Pruner', 'Hoe'] },
      { name: 'Outdoor Furniture', types: ['Table', 'Chair', 'Bench'] },
      { name: 'Plants & Seeds', types: ['Flowers', 'Vegetables', 'Herbs', 'Saplings'] },
      { name: 'Irrigation', types: ['Hoses', 'Sprinklers', 'Drip Systems'] },
    ],
  },
  {
    name: 'Roofing & Waterproofing',
    subcategories: [
      { name: 'Roofing Sheets', types: ['Metal', 'Asphalt Shingles', 'Clay Tiles'] },
      { name: 'Insulation', types: ['Thermal', 'Acoustic', 'Waterproof'] },
      { name: 'Sealants', types: ['Silicone', 'Polyurethane', 'Bitumen'] },
      { name: 'Gutters & Downpipes', types: ['PVC', 'Metal'] },
    ],
  },
  {
    name: 'Construction Machinery',
    subcategories: [
      { name: 'Heavy Machinery', types: ['Excavator', 'Bulldozer', 'Crane'] },
      { name: 'Concrete Equipment', types: ['Mixer', 'Pump', 'Vibrator'] },
      { name: 'Site Equipment', types: ['Scaffolding', 'Wheelbarrow', 'Ladders'] },
    ],
  },
  {
    name: 'DIY & Miscellaneous',
    subcategories: [
      { name: 'Handy Materials', types: ['Glue', 'Tape', 'Nails', 'Screws'] },
      { name: 'Storage', types: ['Shelves', 'Boxes', 'Cabinets'] },
      { name: 'Cleaning Tools', types: ['Broom', 'Mop', 'Vacuum'] },
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
