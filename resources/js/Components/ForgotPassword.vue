<script setup>
import {reactive} from "vue";
import Inertia from "@inertiajs/inertia"
let form = reactive ({
    email:'';
})
const submit = ()=>{
    Inertia.post("/forgotpassword",form)
}
</script>
<template>
    <v-form>
        <v-text-field
            v-model="form.email"
            label="Enter your Email, make sure that you already have an account!"
        ></v-text-field>
    </v-form>
</template>
