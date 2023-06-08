<script setup>
import TaskComponent from "../Components/TaskComponent.vue";
import MainLayout from "../Layouts/MainLayout.vue";
import { defineProps, ref } from "vue";
let tasks = defineProps({
    tasks: Array,
});
let testvar = (ref().value = tasks.tasks);
//I need to make a get request to refersh the page with the new tasks!
let foo = () => {
    testvar.value = [""];
    console.log(testvar.value);
};
let filterValue = ref("default value, nothing changed!");
</script>

<template>
    <v-app>
        <MainLayout v-slot="slotProps">
            <v-container>
                <!-- <div>{{testvar}}</div> -->
                <v-row class="justify-center">
                    <v-col cols="6" class="mx-0">
                        <v-text-field
                            label="Filter the tasks"
                            class="mt-5 presist-input d-inline-element"
                            v-model="filterValue"
                            append-inner-icon="mdi-magnify"
                            @click:append-inner="foo"
                        >
                        </v-text-field>
                    </v-col>
                </v-row>
            </v-container>

            <v-container fluid>
                <v-row class="justify-space-between">
                    <!-- When passing the dynamic props, remember to just mention the name
of the variables inside the object or the array of the child
component!!!-->
                    <TaskComponent
                        v-for="task in testvar"
                        :key="task.id"
                        :name="task.name"
                        :status="task.status"
                        :text="task.text"
                        class="d-inline-element"
                    />
                </v-row>
            </v-container>
            <div>{{ tasks.filter }}</div>
        </MainLayout>
    </v-app>
</template>

<style scoped></style>
