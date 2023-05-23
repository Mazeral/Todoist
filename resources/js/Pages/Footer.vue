<script setup>
import MainLayout from "../Layouts/MainLayout.vue";
import FooterComponent from "../Components/FooterComponent.vue";
</script>
<template>
    <v-app>
        <v-main>
            <MainLayout> <v-slot></v-slot></MainLayout>
            <FooterComponent> </FooterComponent>
        </v-main>
    </v-app>
</template>
