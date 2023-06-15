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
//creating a varaible to choose if we are going to view the form or not
let isForm = ref(false);
let update = () => {
    isForm.value = !isForm.value;
};
//A variable to save the new information
let form = reactive({
    id: props.id,
    newName: "",
    newText: "",
});
//A funciton to update the task
function updateTask() {
    router.post("/updateTask", form);
}
</script>

<template>
    <v-col cols="3" v-if="filtering()">
        <v-card class="border rounded-shaped" v-if="!isForm">
            <v-card-title class="d-flex-inline">
                <v-icon :icon="iconName()" :color="changeColor()" class="mb-2">
                </v-icon>
                {{ name }}
                <v-btn
                    icon="mdi-pencil"
                    class="ml-3"
                    @click.prevent="update()"
                ></v-btn>
                <v-spacer></v-spacer>
                <v-form @submit.prevent="statusUpdate()">
                    <v-btn :color="changeColor()" type="submit" v-if="!isForm">
                        {{ status }}
                    </v-btn>
                </v-form>
            </v-card-title>
            <v-card-text> {{ text }} </v-card-text>
        </v-card>
        <v-sheet v-if="isForm" class="border rounded-shaped">
            <v-container>
                <v-row>
                    <v-text-field
                        variant="underlined"
                        v-model="form.newName"
                        label="New Task Name"
                    ></v-text-field>
                </v-row>
                <v-row>
                    <v-textarea
                        label="New Task Text"
                        v-model="form.newText"
                    ></v-textarea>
                </v-row>
                <v-row class="justify-space-around">
                    <v-btn @click.prevent="updateTask()" color="primary"
                        ><b>CONFIRM</b></v-btn
                    >
                    <v-btn @click.prevent="update()" color="red"
                        ><b>CANCEL</b></v-btn
                    >
                </v-row>
            </v-container>
        </v-sheet>
    </v-col>
</template>
