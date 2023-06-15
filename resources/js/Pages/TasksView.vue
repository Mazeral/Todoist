<script setup>
import TaskComponent from "../Components/TaskComponent.vue";
import MainLayout from "../Layouts/MainLayout.vue";
//Importing the needed packages
import { defineProps, ref } from "vue";
//When using a paginator, the tasks becomes an object
let props = defineProps({
    //  tasks:Array,
    tasks: Object,
});
let filterValue = ref("");
</script>

<template>
    <v-app>
        <MainLayout>
            <v-container>
                <v-row class="justify-center">
                    <v-col cols="6" class="mx-0">
                        <v-text-field
                            label="Filter the tasks"
                            class="mt-5 presist-input d-inline-element"
                            v-model="filterValue"
                        >
                        </v-text-field>
                    </v-col>
                </v-row>
            </v-container>

            <v-container fluid>
                <v-row>
                    <!-- When passing the dynamic props, remember to just mention the name
of the variables inside the object or the array of the child
component!!!-->
                    <TaskComponent
                        v-for="task in props.tasks.data"
                        :filter="filterValue"
                        :key="task.id"
                        :name="task.name"
                        :status="task.status"
                        :text="task.text"
                        :id="task.id"
                        class="d-inline-element"
                    />
                </v-row>
            </v-container>
            <v-container>
                <v-row class="justify-center">
                    <div class="mr-1" v-for="link in props.tasks.links">
                        <!-- if we have a link tag, then rinder the link -->
                        <Link
                            :href="link.url"
                            v-html="link.label"
                            v-if="link.url"
                        />
                    </div>
                </v-row>
            </v-container>
        </MainLayout>
    </v-app>
</template>

<style scoped></style>
