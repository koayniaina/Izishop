<script setup lang="ts">
import {
  Drawer,
  DrawerClose,
  DrawerContent,
  DrawerDescription,
  DrawerHeader,
  DrawerTitle,
  DrawerTrigger,
} from "@/components/ui/drawer";
import { X } from "lucide-vue-next";
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";

defineProps<{
  post: {
    id: number;
    title: string;
    description: string | null;
    price: number;
    image: string | null;
  };
}>();
</script>

<template>
  <Drawer direction="left">
    <!-- Trigger -->
    <DrawerTrigger>
      <button
        class="px-3 py-1.5 text-sm font-medium rounded bg-blue-600 text-white hover:bg-blue-700 transition"
      >
        View
      </button>
    </DrawerTrigger>

    <!-- Drawer -->
    <DrawerContent class="h-screen max-h-screen flex flex-col overflow-x-hidden">

      <!-- Header -->
      <DrawerHeader class="flex items-center border-b px-4 py-3">
        <DrawerTitle class="text-base font-semibold">
          Product details
        </DrawerTitle>

        <DrawerClose>
          <button
            class="p-1 rounded hover:bg-gray-100 transition"
            aria-label="Close"
          >
            <X :size="18" />
          </button>
        </DrawerClose>
      </DrawerHeader>

      <!-- Body -->
      <div class="flex-1 overflow-y-auto p-4 space-y-4">
        <DrawerDescription class="text-sm text-gray-500">
          Here you can see the details of the post.
        </DrawerDescription>

        <!-- Image -->
        <div v-if="post.image">
          <img
            :src="`/storage/${post.image}`"
            alt="Post image"
            class="w-full max-w-md mx-auto rounded-lg object-cover"
          />
        </div>

        <div
          v-else
          class="w-full max-w-md mx-auto bg-gray-100 flex items-center justify-center rounded-lg text-gray-400"
        >
          No image
        </div>

        <!-- Info -->
        <div class="space-y-1">
          <h2 class="text-lg font-semibold">{{ post.title }}</h2>
          <p class="text-sm text-gray-600">
            {{ post.description || "No description available." }}
          </p>
        </div>

        <!-- Price -->
        <p class="text-xl font-bold text-blue-600">
          ${{ post.price }}
        </p>

        <!-- CTA -->
        <Link
          :href="route('page.home')"
          class="inline-flex items-center justify-center w-full py-2 rounded bg-black text-white text-sm font-medium hover:bg-gray-800 transition"
        >
         Add card
        </Link>
      </div>
    </DrawerContent>
  </Drawer>
</template>
