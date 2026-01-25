<template>
    <AppLayout>
        <div class="cart-container">
            <h1 class="title">Your Shopping Bag</h1>

            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Attributes</th>
                        <th>Quantity</th>
                        <th>Shipping</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>

                 <tbody>
                    <!-- <tr v-for="item in cart" :key="item.id">
                        <td>
                            <div class="brand">{{ item.brand }}</div>
                            <div class="name">{{ item.name }}</div>

                        </td>

                        <td class="attributes">
                            Color: {{ item.color }}<br />
                            Size: {{ item.size }}
                        </td>

                        <td class="quantity">
                            <button @click="decrease(item)">−</button>
                            <span>{{ item.quantity }}</span>
                            <button @click="increase(item)">+</button>
                        </td>

                        <td class="shipping">
                            {{
                                item.shipping === 0
                                    ? "Free shipping"
                                    : "$" + item.shipping
                            }}
                        </td>

                        <td class="price">
                            ${{ item.price * item.quantity }}
                        </td>
                        <td>
                            <button class="remove" @click="removeItem(item.id)">
                                <Trash :size="18"/>
                            </button>
                        </td>
                    </tr> -->
                </tbody>
            </table>

            <div class="summary">
                <!-- <p>Subtotal: <strong>${{ subtotal }}</strong></p>
                <p>Estimated Shipping: <strong>${{ shipping }}</strong></p>
                <h2>Total: ${{ total }}</h2> -->

                <button class="checkout">Checkout</button>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { Trash } from "lucide-vue-next";
import AppLayout from "../Layouts/App.vue";
import { ref, computed } from "vue";

const cart = ref([
    {
        id: 1,
        brand: "Marni",
        name: "Blue Trunk Bag",
        color: "Blue",
        size: "One Size",
        price: 2160,
        quantity: 1,
        shipping: 15,
    },
    {
        id: 2,
        brand: "Common Projects",
        name: "Achilles Retro Low",
        color: "White",
        size: "IT 36",
        price: 485,
        quantity: 1,
        shipping: 0,
    },
]);

const subtotal = computed(() =>
    cart.value.reduce((s, i) => s + i.price * i.quantity, 0),
);

const shipping = computed(() => cart.value.reduce((s, i) => s + i.shipping, 0));

const total = computed(() => subtotal.value + shipping.value);

const increase = (item) => item.quantity++;
const decrease = (item) => item.quantity > 1 && item.quantity--;
const removeItem = (id) => (cart.value = cart.value.filter((i) => i.id !== id));
</script>

<style scoped>
.cart-container {
    padding: 1rem 2rem;
    background: #fff;
    margin: 0;
}

.title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 25px;
}

.cart-table {
    max-width: 1330px;
    width: 100%;
    border-collapse: collapse;
}

.cart-table th {
    padding: 12px 0;
    color: #313131;
    font-weight: 500;
    border: 1px solid #f5f5f5;
}
/*

.cart-table td {
    padding: 20px 8px;
    vertical-align: middle;
} */

.brand {
    font-weight: 600;
}

.name {
    font-size: 14px;
    color: #000000;
}

.remove {
    margin-top: 6px;
    /* font-size: 13px; */
    color: #e11d48;
    background: none;
    border: none;
    cursor: pointer;
}

.attributes,
.shipping {
    font-size: 14px;
    color: #000000;
}

.quantity {
    display: flex;
    align-items: center;
    gap: 10px;
}

.quantity button {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 1px solid #ccc;
    background: #fff;
    cursor: pointer;
}

.price {
    text-align: right;
    font-weight: 500;
}

.summary {
    margin-top: 30px;
    text-align: right;
}

.summary p {
    margin: 4px 0;
    color: #555;
}

.summary h2 {
    margin-top: 10px;
    font-size: 22px;
}

.checkout {
    margin-top: 15px;
    background: #f5be4b;
    color: white;
    padding: 0.4rem 1rem;
    border-radius: 4px;
    border: none;
    cursor: pointer;
}
</style>
