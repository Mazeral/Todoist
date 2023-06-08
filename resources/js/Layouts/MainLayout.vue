<script setup>
import { ref, defineProps } from "vue";
import { Link } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import NavDrawer from "../Components/NavDrawer.vue";
let appear = ref(false);
let filterInput = ref("");
async function filter() {
    await Inertia.post("/tasks" /*The value of the filter*/);
}
async function logout() {
    await Inertia.post("/signout");
}
</script>
<template>
    <!--Multiple v-app elements will result in error,
        Thus, the v-app will be -->
    <v-main>
        <v-app-bar>
            <v-app-bar-nav-icon @click="appear = !appear"> </v-app-bar-nav-icon>
            <v-spacer></v-spacer>
            <v-app-bar-nav-icon
                @click="logout"
                icon="mdi-logout"
            ></v-app-bar-nav-icon>
            <div>{{ filterInput }}</div>
        </v-app-bar>
        <NavDrawer v-model="appear" />

        <slot :filterValue="filterInput" />
    </v-main>
    <v-footer
        ><v-card
            flat
            tile
            width="100%"
            color="primary"
            dark
            height="100px"
            class="d-flex align-center justify-center"
        >
            Made by: Mohammad O. Siddiq
            <!--MAKE SURE TO ADD LINKS!-->
        </v-card></v-footer
    >
</template>
