<template>
    <v-form @submit.prevent="submitForm">
        <v-text-field
            v-model="email"
            label="Email"
            type="email"
            required
        ></v-text-field>
        <v-text-field
            v-model="username"
            label="Username"
            required
        ></v-text-field>
        <v-text-field
            v-model="password"
            :type="passwordFieldType"
            label="Password"
            :append-icon="
                passwordFieldType === 'password' ? 'mdi-eye' : 'mdi-eye-off'
            "
            @click:append="switchVisibility"
            required
        ></v-text-field>
        <v-btn type="submit" color="primary">Register</v-btn>
    </v-form>
</template>
