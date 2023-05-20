<script setup></script>

<template>
    <v-form>
        <v-container fill-height-fluid class="d-flex align-center justify-center">
            <v-row justify="center">
                <v-col justify="center" align="center" cols="6">
                    <v-text-field
                        label="Email"
                        type="email"
                        required
                    ></v-text-field>
                    <v-text-field
                        label="Username"
                        type="text"
                        required
                    ></v-text-field>
                    <v-text-field
                        required
                        label="Password"
                        type="password"
                    ></v-text-field>
                    <v-text-field
                        required
                        label="Confirm Password"
                        type="password"
                    ></v-text-field>
                    <v-btn color="primary">Register</v-btn>
                </v-col>
            </v-row>
        </v-container>
    </v-form>
</template>
