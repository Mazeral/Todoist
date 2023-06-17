<script setup>
import ProfileComponent from "../Components/ProfileComponent.vue";
import MainLayout from "../Layouts/MainLayout.vue";
const props = defineProps([
    "name",
    "email",
    "completedTasks",
    "pendingTasks",
    "tasksCount",
]);
</script>
<template>
    <v-app>
        <MainLayout>
            <v-container>
                <ProfileComponent
                    :name="props.name"
                    :email="props.email"
                    :completedTasks="props.completedTasks"
                    :pendingTasks="props.pendingTasks"
                    :tasksCount="props.tasksCount"
                />
            </v-container>
        </MainLayout>
    </v-app>
</template>
