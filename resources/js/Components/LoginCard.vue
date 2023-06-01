<!-- Starting point for the login card, not a comppleted one! -->
<template>
    <v-card>
        <div class="d-flex align-center justify-center" style="height: 100vh">
            <v-sheet width="400" class="mx-auto">
                <v-form method="POST" fast-fail @submit.prevent="login">
                    <v-text-field
                        v-model="form.email"
                        label="Email"
                        type="email"
                        required
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password"
                        label="password"
                        required
                    ></v-text-field>
                    <a href="#" class="text-body-2 font-weight-regular"
                        >Forgot Password?</a
                    >
                    <v-btn type="submit" color="primary" block class="mt-2"
                        >Sign in</v-btn
                    >
                </v-form>
                <div class="mt-2">
                    <p class="text-body-2">
                        Don't have an account?
                        <Link href="/RegisterPage">Sign Up</Link>
                    </p>
                </div>
            </v-sheet>
        </div>
    </v-card>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { reactive } from "vue";
let form = reactive({
    email: "",
    password: "",
});
let submit = () => {
    Inertia.post("/signin", signin);
};
</script>
