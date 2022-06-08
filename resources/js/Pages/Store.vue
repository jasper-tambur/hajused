<template>
  <Head title="E-pood" />
  <NavBar />
  <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <div class="grid grid-cols-4 gap-4">
          <Product
            v-for="item in items"
            :key="item.id"
            :image="item.image"
            :title="item.title"
            :description="item.description"
            :category="item.category"
            :price="item.price"
            :data="item"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// import NavBar from '/resources/js/Components/Navbar.vue'
import Input from "/resources/js/Components/Input.vue";
// import Product from '/resources/js/Components/Product.vue'
export default {
  components: {
    Input,
  },
  props: { data: JSON },
  emits: {
    addToCart: function (data) {
      const dataForm = useForm({
        id: data.id,
        title: data.title,
        description: data.description,
        price: data.price,
      });
      console.log(dataForm);
      dataForm.post(route("add.cart"));
    },
    // addQty: function(id){
    //     qtyList[id] = $refs.qty.value
    //     console.log(qtyList)
    // }
  },
  data() {
    return {
      items: null,
    };
  },
  created() {
    axios
      .get("https://epood.ta19heinsoo.itmajakas.ee/api/hajus")
      .then((response) => (this.items = response.data));
  },
};
// export default { layoutName: "Authenticated" };
</script>
<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { inject, ref } from "vue";
const route = inject("route");
// console.log(this.route);
// let qty = ref(1);
</script>
<style scoped>
</style>