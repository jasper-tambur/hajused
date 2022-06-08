<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
                            <Link class="bg-gray-800 text-white font-bold text-sm uppercase px-2 py-1 rounded" :href="route('blog.add')">create new blog</Link>
         <div class="flex justify-between py-2" v-for="(post, index) in posts" :key="index">
             <p>{{post.title}}</p>
            <div class="flex gap-4">
                <Link class="bg-gray-800 text-white font-bold text-sm uppercase px-2 py-1 rounded" :href="route('blog.edit', post.id)">Edit</Link>
                <Link class="bg-red-500 bg-opacity-80 text-white font-bold text-sm uppercase px-2 py-1 rounded" as="button" method="post" :href="route('blog.delete', post.id)">Delete</Link>
            </div>
         </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { inject } from '@vue/runtime-core';
import { Link } from '@inertiajs/inertia-vue3';
export default { layoutName: "Authenticated" };
</script>
<script setup>
const route = inject('route')
const props = defineProps({
    posts: {
        type: Array,
        default: null
    }
})

</script>