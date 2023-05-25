<script setup>
import NavBar from "../Components/NavBar.vue";
</script>
<template>
    <v-app>
        <NavBar />
        <v-main>
            <slot />
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
    </v-app>
</template>
