<script setup>
import TaskComponent from "../Components/TaskComponent.vue";
import { defineProps, ref } from "vue";
let tasks = defineProps({
    tasks: Array,
});
</script>
<template>
    <v-app>
        <MainLayout>
            <v-container>
                <v-row class="justify-space-between">
                    <!-- When passing the dynamic props, remember to just mention the name
of the variables inside the object or the array of the child
component!!!-->
                    <ul v-for="task in tasks.tasks" :key="task.id">
                        <li>
                            <TaskComponent
                                :name="task.name"
                                :status="task.status"
                                :text="task.text"
                            />
                        </li>
                    </ul>
                </v-row>
            </v-container>
            <div>{{ tasks.tasks }}</div>
        </MainLayout>
    </v-app>
</template>
