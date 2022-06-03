<template>
<NavBar />
  <Head title="Weather" />
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
      <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="text-2xl">Koht: {{ data.name }} </div>
          <div class="text-2xl">Ilm: {{ data.weather[0].main }}</div>
          <div class="text-2xl">Temperatuur: {{ data.main.temp }}</div>
          <div class="text-2xl">Tundub nagu: {{data.main.feels_like}}</div>
          <div class="text-2xl">Tuule kiirus: {{data.wind.speed}}</div>
          <div class="text-2xl"></div>
          <div class="text-2xl"></div>
          <div class="text-2xl"></div>
          <div class="text-2xl"></div>
        </div>
      </div>
    </div>
</template>
<script>
export default {
  props: { data: String },
};
// export default { layoutName: "Authenticated" };
</script>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
</script>
<style scoped>
</style>