<script setup>
import ProfileComponent from "../Components/ProfileComponent.vue";
import MainLayout from "../Layouts/MainLayout.vue";
const props = defineProps(["name", "email"]);
</script>
<template>
    <v-app>
        <MainLayout>
            <v-container>
                <ProfileComponent :name="props.name" :email="props.email" />
            </v-container>
        </MainLayout>
    </v-app>
</template>
