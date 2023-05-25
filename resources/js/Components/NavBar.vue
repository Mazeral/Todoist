<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import NavDrawer from "../Components/NavDrawer.vue";
let appear = ref(false);
let search = ref("");
</script>
<template>
    <v-app-bar rounded>
        <v-app-bar-nav-icon @click="appear = !appear"> </v-app-bar-nav-icon>
        <v-spacer></v-spacer>
        <v-text-field
            label="Search for a task"
            class="mt-5"
            v-model="search"
        ></v-text-field>
        <v-app-bar-nav-icon icon="mdi-magnify"></v-app-bar-nav-icon>
        <v-app-bar-nav-icon icon="mdi-logout"></v-app-bar-nav-icon>
    </v-app-bar>
    <NavDrawer v-model="appear" />
</template>
