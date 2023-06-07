<script setup>
import TaskComponent from "../Components/TaskComponent.vue";
import MainLayout from "../Layouts/MainLayout.vue";
import { defineProps, ref } from "vue";
let tasks = defineProps({
    tasks: Array,
    filter: String,
});
</script>
<template>
    <v-app>
        <MainLayout>
            <v-container fluid>
                <v-row class="justify-space-between">
                    <!-- When passing the dynamic props, remember to just mention the name
of the variables inside the object or the array of the child
component!!!-->

                    <TaskComponent
                        v-for="task in tasks.tasks"
                        :key="task.id"
                        :name="task.name"
                        :status="task.status"
                        :text="task.text"
                        class="d-inline-element"
                    />
                </v-row>
            </v-container>
            <div>{{tasks.filter}}</div>
        </MainLayout>
    </v-app>
</template>
<style scoped></style>
