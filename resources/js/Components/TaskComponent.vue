<script setup>
import { reactive, defineProps, ref } from "vue";
import { router } from "@inertiajs/vue3";
//Defining the props
let props = defineProps({
    taskArray: Array,
    name: String,
    id: Number,
    status: String,
    text: String,
    filter: String,
});
//Function to return the proper icon for the task
function iconName() {
    if (props.status === "Pending") return "mdi-clock-outline";
    else if (props.status === "Completed") return "mdi-check";
}
if (props.status === "Completed") iconName.value = "mdi-check";
//When defining it in the parent component,only mention the elements in the array or the object!!
function changeColor() {
    if (props.status == "Pending") return "orange";
    else if (props.status == "Completed") return "green";
}
let filtering = () => {
    return props.name.toLowerCase().includes(props.filter.toLowerCase());
};
//Send with the post the id of the task, make a post request and change the status!
const postData = reactive({ id: props.id });
let statusUpdate = () => {
    router.post("statusUpdate", postData, {
        preserveState: true,
    });
};
</script>

<template>
    <v-col cols="3" v-if="filtering()">
        <v-card class="border rounded-shaped">
            <v-card-title>
                <v-icon :icon="iconName()" :color="changeColor()" class="mb-2">
                </v-icon>
                {{ name }}
                <v-spacer></v-spacer>
                <v-form @submit.prevent="statusUpdate()">
                    <v-btn :color="changeColor()" type="submit">
                        {{ status }}
                    </v-btn>
                </v-form>
            </v-card-title>
            <v-card-text> {{ text }} </v-card-text>
        </v-card>
    </v-col>
</template>
