<script setup>
defineProps(["data"]);
</script>
<template lang="">
    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5">
            <div class="w-20">
              <img class="h-24" :src="'https://epood.ta19heinsoo.itmajakas.ee/' + data.image" alt="">
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm">{{data.title}}</span>
              <span class="text-red-500 text-xs">{{data.title}}</span>
              <a @click="$emit('deleteItem', data.id)" class=" cursor-pointer font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
            </div>
          </div>
          <div class="flex justify-center w-1/5">
            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
            </svg>

            <input @input="$emit('changeQty', data)" class="mx-2 border text-center w-12" type="text" :value="data.qty">

            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
              <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
            </svg>
          </div>
          <span class="text-center w-1/5 font-semibold text-sm">{{data.price}}</span>
          <span class="text-center w-1/5 font-semibold text-sm">{{data.price*data.qty}}</span>
        </div>
</template>
<script>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { inject, ref } from "vue";
export default {
  emits: {
    deleteItem: function (itemID) {
      const dataForm = useForm({ id: itemID });
      dataForm.delete(route("delete.cart", { id: itemID }));
    },
    changeQty: function (data){
        const dataForm = useForm(data)
        dataForm.put(route('update.cart', {id: data.id}))
    }
  },
};
</script>
<style lang="">
</style>