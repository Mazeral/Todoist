<script setup>
import { ref, defineProps } from "vue";
import { Link } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import NavDrawer from "../Components/NavDrawer.vue";
let appear = ref(false);
let filterValue = ref("default value");
async function filter() {
    await Inertia.post("/tasks", filterValue);
}
async function logout() {
    await Inertia.post("/signout");
}
</script>
<template>
    <v-app-bar>
        <v-app-bar-nav-icon @click="appear = !appear"> </v-app-bar-nav-icon>
        <v-spacer></v-spacer>
        <v-text-field
            label="Filter the tasks"
            class="mt-5 presist-input"
            v-model="filterValue"
        ></v-text-field>
        <v-app-bar-nav-icon
            icon="mdi-magnify"
            @click="$emit('myEvent', 'Hello world!')"
        ></v-app-bar-nav-icon>
        <v-app-bar-nav-icon
            @click="logout"
            icon="mdi-logout"
        ></v-app-bar-nav-icon>
    </v-app-bar>
    <NavDrawer v-model="appear" />
</template>
