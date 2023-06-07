<script setup>
import { ref, defineProps } from "vue";
import { Link } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import NavDrawer from "../Components/NavDrawer.vue";
let appear = ref(false);
const props = defineProps({
    filter: String,
});
async function logout() {
    await Inertia.post("/signout");
}
</script>
<template>
    <v-app-bar >
        <v-app-bar-nav-icon @click="appear = !appear"> </v-app-bar-nav-icon>
        <v-spacer></v-spacer>
        <v-text-field
            label="Filter the tasks"
            class="mt-5"
            v-model="props.filter"
        ></v-text-field>
        <v-app-bar-nav-icon icon="mdi-magnify"></v-app-bar-nav-icon>
        <v-app-bar-nav-icon
            @click="logout"
            icon="mdi-logout"
        ></v-app-bar-nav-icon>
    </v-app-bar>
    <NavDrawer v-model="appear" />
</template>
