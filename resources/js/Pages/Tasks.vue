<script setup>
import TaskComponent from "../Components/TaskComponent.vue";
</script>
<template>
    <v-container>
        <v-row class="justify-space-between ">
            <v-col>
                <TaskComponent />
            </v-col>
            <v-col>
                <TaskComponent  />
            </v-col>
            <v-col>
                <TaskComponent  />
            </v-col>
        </v-row>
    </v-container>
</template>
