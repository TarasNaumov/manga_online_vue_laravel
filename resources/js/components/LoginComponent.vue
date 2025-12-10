<script setup>
import FormFieldComponent from "./FormFieldComponent.vue";
import {Form} from "vee-validate";
import * as Yup from "yup";
import axios from "axios";
import { useRouter } from 'vue-router'

const router = useRouter();

const loginSchema = Yup.object({
    email: Yup.string().required("Email is required").email("Email is uncorrected"),
    password: Yup.string().min(8, "Password must contain at least 8 characters").required("Password is required"),
});

function onSubmit(values) {
    axios.post('/api/v2/login', values)
        .then(response => {
            const token = response.data.access_token;
            localStorage.setItem('token', token);
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

            router.push('/main');
        }).catch(error => console.log(error));
}
</script>

<template>
    <div class="full-screen-h login-component">
        <Form :validation-schema="loginSchema" v-slot="{ meta, handleSubmit }" class="login-form">
            <h2>Login</h2>
            <FormFieldComponent label="Email" id="email" type="email" name="email"/>
            <FormFieldComponent label="Password" id="password" type="password" name="password"/>
            <div class="formFooter">
                <button type="submit" @click.prevent="handleSubmit(onSubmit)" :disabled="!meta.valid">Login</button>
                <router-link to="/register">Create account</router-link>
            </div>
        </Form>
    </div>
</template>

<style scoped>
.login-component {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #3c3c3c;
    color: #ffb700;
    font-family: "arial", sans-serif;
}

.login-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 25px;
    width: 400px;
    background: #303030;
    border-radius: 5px;
}

h2 {
    font-size: 25px;
    text-align: center;
}

.formFooter {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.formFooter button {
    padding: 10px 20px;
    background: #a57b01;
    color: #fff;
    cursor: pointer;
}

.formFooter button:hover {
    background: #876401;
}

.formFooter a {
    text-decoration: underline;
}

.formFooter a:hover {
    text-decoration: none;
}
</style>
