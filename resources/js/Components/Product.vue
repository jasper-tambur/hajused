
<template>
    <div class="rounded overflow-hidden shadow-lg">
        <img class="w-full" :src="'https://epood.ta19heinsoo.itmajakas.ee/' + image" alt="">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ title }}</div>
            <p class="text-gray-700 text-base">
                {{ description }}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{
                        category
                }}</span>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Price:
                {{ price }}</span>
            <input type="number" v-model="qty"/>
            <button @click="addToCart(data, qty)"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to cart</button>
        </div>
    </div>
</template>
<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import axios from 'axios'
import { inject, ref } from "vue";
const route = inject("route");
defineProps(["image", "title", "description", "category", "price", "data"])
let qty = ref(1)
console.log(qty.value)
function addToCart(data, qty){
    const dataForm = useForm({
                id: data.id,
                image: data.image,
                title: data.title,
                description: data.description,
                price: data.price,
                qty: qty
            })
            console.log(dataForm)
            console.log(qty)
            dataForm.post(route("add.cart"), {
                onSuccess: () => qty = 1
            })
}
</script>