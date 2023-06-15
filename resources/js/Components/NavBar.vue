<script setup>
import { ref, defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
import NavDrawer from "../Components/NavDrawer.vue";
let appear = ref(false);
let filterValue = ref("default value");
function filter() {
    router.post("/tasks", filterValue);
}
function logout() {
    router.post("/signout");
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
        <v-app-bar-nav-icon icon="mdi-magnify"></v-app-bar-nav-icon>
        <v-form @submit.prevent="logout()">
            <v-app-bar-nav-icon
                icon="mdi-logout"
                type="submit"
            ></v-app-bar-nav-icon>
        </v-form>
    </v-app-bar>
    <NavDrawer v-model="appear" />
</template>
