<script setup lang="ts">
import {
  Drawer,
  DrawerClose,
  DrawerContent,
  DrawerDescription,
  DrawerFooter,
  DrawerHeader,
  DrawerTitle,
  DrawerTrigger,
} from '@/components/ui/drawer'
import { TextAlignEnd, X } from 'lucide-vue-next';

</script>

<template>

  <Drawer direction="right">
    <DrawerTrigger>
        <TextAlignEnd :size="18"/>
    </DrawerTrigger>

    <DrawerContent>
      <DrawerHeader>
        <DrawerTitle>Are you absolutely sure?</DrawerTitle>
        <DrawerDescription>
            his action cannot be undone.
        </DrawerDescription>
        <div  class="drawer">
            <DrawerClose>
             <Button variant="outline">
               <X  :size="18"/>
             </Button>
           </DrawerClose>
        </div>
      </DrawerHeader>

      <DrawerFooter>

      </DrawerFooter>
    </DrawerContent>
  </Drawer>
</template>
<style>
    .drawer{
        position: absolute;
        right: 12px;
        /* padding: .2rem; */
    }
</style>
