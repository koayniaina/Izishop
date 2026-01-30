<script setup lang="ts">
import { Link, usePage, router } from "@inertiajs/vue3";
import {
    BookXIcon,
    Box,
    LayoutDashboard,
    LogOut,
    Receipt,
    Users,
} from "lucide-vue-next";
import { route } from "ziggy-js";
import AdminUserMenu from "./AdminUserMenu.vue";

// const user = usePage().props.auth.user;

// const logout = () => {
//     router.post(route("logout"));
// };
</script>

<template>
    <header>
        <!-- Logo -->
        <main>
            <div class="logo">
                <h2>Izzishop.</h2>
            </div>

            <nav class="flex gap-5">
                <div class="adminLink">
                    <LayoutDashboard :size="18" color="#f5b400"/>
                    <Link :href="route('page.admin')">
                        Dashboard
                    </Link>
                </div>
                <div class="adminLink">
                    <Users :size="18" color="#f5b400" />
                    <Link :href="route('page.user')">
                        Users
                    </Link>
                </div>
                <div class="adminLink">
                    <Box :size="18" color="#f5b400" />
                    <Link :href="route('page.product')">
                        Products
                    </Link>
                </div>
                <div class="adminLink">
                    <Receipt :size="18" color="#f5b400" />
                    <Link
                        :href="route('page.transaction')"
                    >
                        Transactions
                    </Link>
                </div>
            </nav>
        </main>

        <!-- User -->
        <div class="flex items-center gap-3">
            <AdminUserMenu/>
        </div>
    </header>
</template>

<style scoped>
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    color: white;
    background-color: #000000;
}

.roundeds{
    display: flex;
    align-items: center;
    text-transform: uppercase;
    font-size: .8rem;
    border-radius: 4px;
    gap: .3rem;
    border: 1px solid #f5b400;
    cursor: pointer;
    padding: .2rem 1rem;
}

main {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.logo{
    color: #f5b400;
    border-right: 1px solid white;
    padding-right: 1rem;
    font-size: 1.2rem;
    text-transform: uppercase;
}

.adminLink {
    display: flex;
    align-items: center;
    gap: 0.4rem;

    a{
        font-size: .9rem;
        text-decoration: none;
    }
}
</style>
