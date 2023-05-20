<template>
    <!--Starting point for the profile page card, not a completed one tho!  -->
    <v-card class="mx-auto" max-width="400">
        <v-card-title>User Profile</v-card-title>
        <v-card-subtitle>{{ username }}</v-card-subtitle>
        <v-card-text>
            <v-avatar size="100" color="grey">
                <img :src="userImage" alt="User Image" />
            </v-avatar>
        </v-card-text>
        <v-card-actions>
            <v-list-item>
                <v-list-item-title>Email:</v-list-item-title>
                <v-list-item-subtitle>{{ email }}</v-list-item-subtitle>
            </v-list-item>
        </v-card-actions>
    </v-card>
</template>
