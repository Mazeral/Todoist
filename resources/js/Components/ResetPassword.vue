<script setup>
import Inertia from "@inertiajs/inertia";
import { reactive } from "vue";
let form = reactive({
    password: "",
    confirm: "",
});
let submit = () => {
    if (form.password === form.confirm) Inertia.post("/resetpass", form);
};
</script>
<template>
    <v-form>
        <v-text-field
            v-model="form.password"
            label="Enter your new password"
        ></v-text-field>
        <v-text-field
            v-model="form.confirm"
            label="Confirm your new password"
        ></v-text-field>
    </v-form>
</template>
