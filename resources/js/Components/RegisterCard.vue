<script setup>
import { ref, reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
let form = reactive({
    email: "",
    name: "",
    password: "",
});
let confirm = ref("");
let submit = () => {
    if (form.password === confirm.value) {
        //The "register", or in other words, the first parameter is the end point
        //on the back end
        Inertia.post("register", form);
    }
};
</script>

<template>
    <v-form @submit.prevent="submit">
        <v-container fill-height class="d-flex align-center justify-center">
            <v-row justify="center">
                <v-col justify="center" align="center" cols="6">
                    <v-text-field
                        v-model="form.email"
                        label="Email"
                        type="email"
                        required
                    ></v-text-field>
                    <v-text-field
                        v-model="form.username"
                        label="Name"
                        type="text"
                        required
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password"
                        required
                        label="Password"
                        type="password"
                    ></v-text-field>
                    <v-text-field
                        v-model="confirm"
                        required
                        label="Confirm Password"
                        type="password"
                    ></v-text-field>
                    <v-btn color="primary" type="submit">Register</v-btn>
                    <p><Link href="/HomePage">Return to Home Page</Link></p>
                </v-col>
            </v-row>
        </v-container>
    </v-form>
</template>
