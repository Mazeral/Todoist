<template>
    <v-app>
        <MainLayout>
            <v-container> <LoginCard /> </v-container>
        </MainLayout>
    </v-app>
</template>
<script setup>
import LoginCard from "../Components/LoginCard.vue";
import MainLayout from "../Layouts/MainLayout.vue";
</script>
