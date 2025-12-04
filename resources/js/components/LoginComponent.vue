<script setup>
import FormFieldComponent from "./FormFieldComponent.vue";
import { Form } from "vee-validate"; // 👈 Імпорт Form
import * as Yup from "yup";          // 👈 Імпорт Yup
import axios from "axios";
import router from "../router.js";
// import { useAuthStore } from "@/stores/authStore"; // 💡 Якщо використовуєте Pinia/Vuex

// 1. Схема Валідації
const loginSchema = Yup.object({
    email: Yup.string().required("Email is required").email("Email is uncorrected"),
    password: Yup.string().required("Password is required"),
});

// 2. Метод Подання Форми
function onSubmit(values) {
    axios.post('/api/v2/login', values) // ⬅️ Змініть на свій API-endpoint
        .then(response => {
            console.log('Успішний вхід:', response.data);
            // 🔑 Збереження Токена (Критичний крок!)
            const token = response.data.access_token; // Або response.data.token
            localStorage.setItem('user_token', token);
            // 🧭 Перенаправлення на головну сторінку
            router.push('/');
        }).catch(error => {
        // Обробка помилок (наприклад, невірний логін/пароль)
        console.error('Помилка входу:', error.response ? error.response.data : error.message);
        alert('Невірний Email або пароль.'); // Просте повідомлення про помилку
    });
}
</script>

<template>
    <Form :validation-schema="loginSchema" v-slot="{ meta, handleSubmit }" class="loginForm">
        <FormFieldComponent label="Email" id="email" type="email" name="email"/>
        <FormFieldComponent label="Password" id="password" type="password" name="password"/>
        <div>
            <button type="submit" @click="handleSubmit(onSubmit)" :disabled="!meta.valid">Login</button>
            <router-link to="/register">Create account</router-link>
        </div>
    </Form>
</template>

<style scoped>
/* Ваш CSS тут */
</style>
