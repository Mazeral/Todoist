<script setup>
import TaskComponent from "../Components/TaskComponent.vue";
import MainLayout from "../Layouts/MainLayout.vue";
//Importing the needed packages
import { reactive, defineProps, ref } from "vue";
import { router } from "@inertiajs/vue3";
//When using a paginator, the tasks becomes an object
let props = defineProps({
    //  tasks:Array,
    tasks: Object,
});
let filterValue = ref("");
let form = ref(false);
function formActivate() {
    form.value = !form.value;
}

//the auth user id:
//Object to save the new task
let taskNew = reactive({
    name: "",
    text: "",
});

//Object to send the post request
function taskCreate() {
    router.post("/taskCreate", taskNew);
}
</script>

<template>
    <v-app>
        <MainLayout>
            <v-container v-if="!form">
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

            <v-form v-if="form">
                <v-container>
                    <v-row class="justify-center">
                        <v-col cols="6">
                            <v-text-field
                                label="Task Name"
                                v-model="taskNew.name"
                            ></v-text-field>
                            <v-textarea
                                label="Task Details"
                                v-model="taskNew.text"
                            ></v-textarea>
                            <v-row class="justify-center">
                                <v-btn
                                    @click.prevent="taskCreate()"
                                    class="mx-4"
                                    color="green"
                                    ><b>SUBMIT</b></v-btn
                                >
                                <v-btn
                                    color="red"
                                    class="mx-4"
                                    @click.prevent="formActivate()"
                                    ><b>CANCEL</b></v-btn
                                >
                            </v-row>
                        </v-col>
                    </v-row>
                </v-container>
            </v-form>
            <v-container>
                <v-row class="justify-center">
                    <v-btn
                        color="blue"
                        @click.prevent="formActivate()"
                        v-if="!form"
                        ><b>Add New Task</b></v-btn
                    >
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
