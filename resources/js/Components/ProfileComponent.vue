<script setup>
import { ref, reactive } from "vue";
import { router } from "@inertiajs/vue3";
const props = defineProps([
    "name",
    "email",
    "completedTasks",
    "pendingTasks",
    "tasksCount",
]);
function deleteAccount() {
    router.post("userDelete");
}

//Variables for the check boxes
</script>
<template>
    <v-container>
        <!-- d-flex is for making the elements in the center, but that wont make them in the center the way we want it, thus we make the .text-center  -->
        <v-sheet class="align-center d-flex text-center justify-center">
            <!-- the name, the email, the amount of the tasks -->
            <div>
                <h1>Name: {{ name }}</h1>
                <h1>Email: {{ email }}</h1>
                <h1>Completed Tasks: {{ completedTasks }}</h1>
                <h1>Total Tasks: {{ tasksCount }}</h1>
            </div>
        </v-sheet>
    </v-container>
</template>
