<template>
            <v-col cols="3">
                <v-card class="border rounded-shaped">
                    <v-card-title>
                        <v-icon
                            :icon="iconName()"
                            :color= "changeColor()"
                            class="mb-2"
                        >
                        </v-icon>
                        {{ name }}
                        <v-spacer></v-spacer>
                        <v-btn
                            @click="changeStatus(task)"
                            :color="changeColor()"
                        >
                            {{ status }}
                        </v-btn>
                    </v-card-title>
                    <v-card-text> {{ text }} </v-card-text>
                </v-card>
            </v-col>
</template>

<script setup>
import { reactive, defineProps, ref } from "vue";
//Defining the props
let props = defineProps({
    taskArray: Array,
    name: String,
    id: Number,
    status: String,
    text: String,
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
</script>
