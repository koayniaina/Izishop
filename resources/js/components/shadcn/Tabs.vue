<script setup lang="ts">
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
</script>

<template>
    <div class="flex w-full max-w-3xl flex-col gap-6">
        <Tabs default-value="account">
            <!-- Tabs buttons -->
            <TabsList class="flex flex-wrap">
                <TabsTrigger value="deal">Deal of the Day</TabsTrigger>
                <TabsTrigger value="best">Best Sellers</TabsTrigger>
                <TabsTrigger value="hot">Hot Deals</TabsTrigger>
                <TabsTrigger value="new">New Arrival</TabsTrigger>
                 <TabsTrigger value="new">All</TabsTrigger>
            </TabsList>
        </Tabs>
    </div>
</template>
