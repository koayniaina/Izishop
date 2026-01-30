<script setup lang="ts">
import { usePage, router } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { UserRound } from "lucide-vue-next";

// const user = usePage().props.auth.user;

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <DropdownMenu>
        <!-- Trigger -->
        <DropdownMenuTrigger as-child>
            <button
                class="flex items-center gap-1 bg-white text-black px-3 py-2 rounded-full  transition"
            >
                 <UserRound :size="18"/>
                <!-- <span class="font-medium">{{ user.name }}</span> -->
                <!-- Chevron down -->
                <svg
                    class="w-4 h-4 ml-1 text-black"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19 9l-7 7-7-7"
                    ></path>
                </svg>
            </button>
        </DropdownMenuTrigger>

        <!-- Content -->
        <DropdownMenuContent align="end" class="w-48">
            <DropdownMenuLabel>My Account</DropdownMenuLabel>
            <DropdownMenuSeparator />

            <DropdownMenuItem @click="$inertia.visit(route('page.profile'))">
                Profile
            </DropdownMenuItem>

            <DropdownMenuItem @click="$inertia.visit(route('page.settings'))">
                Settings
            </DropdownMenuItem>

            <DropdownMenuSeparator />

            <DropdownMenuItem class="text-red-600" @click="logout">
                Logout
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>

<style>
.font-medium{
    font-size: .8rem;
}
</style>
