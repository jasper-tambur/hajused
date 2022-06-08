<template>
<NavBar />
  <div class="lg:w-7/12 w-full h-96">
    <div class="h-full w-full" id="map" ref="map"></div>
    <form @submit="form.post('/googlemaps')">
      <input type="text" v-model="form.name" />
      <input type="text" v-model="form.description" />
      <input type="text" v-model="form.lat" />
      <input type="text" v-model="form.lng" />
      <input  type="submit" class="btn" value="Add marker" />
    </form>
    <!-- {{ data }} -->
    <table>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>latitude</th>
        <th>longitude</th>
      </tr>
      <tr v-for="item in data" :key="item.id">
        <td>{{ item.name }}</td>
        <td>{{ item.description }}</td>
        <td>{{ item.latitude }}</td>
        <td>{{ item.latitude }}</td>
        <a :href="route('marker.edit', item.id)" class="btn">Edit</a>
        <button @click.prevent="deleteMarker(item.id)" class="btn">Delete</button>
      </tr>
    </table>
  </div>
</template>
<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { Loader } from "@googlemaps/js-api-loader";
import { inject, ref } from "vue";
import { defineProps, reactive, defineEmits } from "vue";
import { Inertia } from '@inertiajs/inertia';
const route = inject("route");
const props = defineProps({
  data: String,
});
let map = ref(null);
const loader = new Loader({
  apiKey: "",
  version: "weekly",
});
const form = useForm({
  lat: "",
  lng: "",
  name: "",
  description: "",
});
const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let labelIndex = 0;
loader.load().then(() => {
  let myLatLng = { lat: 58.24806, lng: 22.50389 };
  map = new google.maps.Map(map.value, {
    zoom: 8,
    center: myLatLng,
  });
  for (const key in props.data) {
    let marker = new google.maps.Marker({
      position: {
        lat: props.data[key].latitude,
        lng: props.data[key].longitude,
      },
      label: props.data[key].name,
      map,
    });
  }
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });
  google.maps.event.addListener(map, "click", (event) => {
    const cord = event.latLng.toJSON();
    form.lng = cord.lng;
    form.lat = cord.lat;
    addMarker(event.latLng, map);
    // form.post("/googlemaps");
  });
});
function addMarker(location, map) {
  new google.maps.Marker({
    position: location,
    label: form.name ? form.name : "",
    map: map,
  });
}

const deleteMarker = (id) => Inertia.delete(route('marker.delete',id))
</script>