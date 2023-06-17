<script setup>
import { ref, defineProps } from "vue";
import NavDrawer from "../Components/NavDrawer.vue";
import { router } from "@inertiajs/vue3";
let appear = ref(false);
let filterInput = ref("");
function filter() {
    router.post("/tasks" /*The value of the filter*/);
}
function logout() {
    router.post("/signout");
}
function profile() {
    router.get("/profile");
}
function tasks() {
    router.get("/tasks");
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
                v-if="this.$page.url != `/tasks`"
                icon="mdi-view-module"
                @click.prevent="tasks()"
            ></v-app-bar-nav-icon>
            <v-app-bar-nav-icon
                icon="mdi-human-greeting-variant"
                @click="profile"
                v-if="this.$page.url != `/profile`"
            ></v-app-bar-nav-icon>
            <v-app-bar-nav-icon
                @click="logout"
                icon="mdi-logout"
            ></v-app-bar-nav-icon>
            <div>{{ filterInput }}</div>
        </v-app-bar>
        <NavDrawer v-model="appear" />

        <slot
            :filterValue="filterInput"
        />
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
