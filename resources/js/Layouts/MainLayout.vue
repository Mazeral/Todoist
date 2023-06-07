<script setup>
import NavBar from "../Components/NavBar.vue";
</script>
<template>
    <!--Multiple v-app elements will result in error,
        Thus, the v-app will be on teh views, no the layout -->
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
</template>
