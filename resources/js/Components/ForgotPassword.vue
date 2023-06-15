<script setup>
import {reactive} from "vue";
import {router} from "@inertiajs/vue3";
let form = reactive ({
    email:'';
})
const submit = ()=>{
    router.post("/forgotpassword",form)
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
