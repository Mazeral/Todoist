<script setup>
const props = defineProps(["name", "email"]);
</script>
<template>
    <v-container>
        <v-row class="justify-center align-center">
            <v-col cols="8">
                <v-card>
                    <v-card-title class="d-flex align-items-center">
                        <v-avatar inline size="80">
                            <img
                                src="https://via.placeholder.com/80"
                                alt="Profile image"
                            />
                        </v-avatar>
                        <div class="ml-4">
                            <h3>{{ props.name }}</h3>
                        </div>
                        <v-btn icon class="mx-5">
                            <v-icon icon="mdi-pencil"></v-icon>
                        </v-btn>
                    </v-card-title>
                    <v-card-text>
                        <p><strong>Email:</strong> {{ props.email }}</p>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
