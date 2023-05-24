<template>
    <v-container fluid>
        <v-row>
            <v-col v-for="task in tasks" :key="task.id">
                <v-card class="border">
                    <v-card-title>
                        <v-icon :color="task.status.color">
                            {{ task.status.icon }}
                        </v-icon>
                        {{ task.title }}
                        <v-spacer></v-spacer>
                        <v-btn
                            @click="changeStatus(task)"
                            :color="task.status.color"
                        >
                            {{ task.status.text }}
                        </v-btn>
                    </v-card-title>
                    <v-card-text>
                        {{ task.description }}
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import { reactive } from "vue";
let tasks = reactive([
    {
        id: 1,
        title: "Task 1",
        description: "Task description goes here.",
        status: {
            text: "Pending",
            icon: "mdi-clock-outline",
            color: "orange",
        },
    },
    // ... other tasks
]);
const changeStatus = function (task) {
    // Implement your logic to change the status of the task
    // For example:
    if (task.status.text === "Pending") {
        task.status = {
            text: "Completed",
            icon: "mdi-check",
            color: "green",
        };
    } else {
        task.status = {
            text: "Pending",
            icon: "mdi-clock-outline",
            color: "orange",
        };
    }
};
</script>
