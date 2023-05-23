<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <v-app-bar fixed>
        <v-navigation-drawer app>
            <v-list>
                <!-- here, we should use inertia links -->
                <v-list-item><Link href="#"></Link></v-list-item>
                <v-list-item><Link href="#"></Link></v-list-item>
                <v-list-item><Link href="#"></Link></v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-spacer></v-spacer>
        <v-btn>Sign In</v-btn>
        <v-btn>Sign Out</v-btn>
    </v-app-bar>
</template>
