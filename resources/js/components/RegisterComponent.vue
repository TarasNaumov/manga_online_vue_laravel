<script setup>
import FormFieldComponent from "./FormFieldComponent.vue";
import { Form } from "vee-validate";
import * as Yup from "yup";
import axios from "axios";
import router from "../router.js";

const registrationSchema = Yup.object({
    name: Yup.string().required("Name is required"),
    surname: Yup.string().required("Surname is required"),
    email: Yup.string().required("Email is required").email("Email is uncorrected"),
    password: Yup.string().min(8, "Password must contain at least 8 characters").required("Password is required"),
})

function onSubmit(values) {
    axios.post('/api/v2/register', values)
        .then(response => {
            console.log('Успішно зареєстровано:', response.data);
            router.push('/login');
        }).catch(error => console.log(error));
}
</script>

<template>
    <div class="full-screen-h register-component">
        <Form :validation-schema="registrationSchema" v-slot="{ meta, handleSubmit }" class="register-form">
            <FormFieldComponent id="name" type="text" label="Your name" name="name" />
            <FormFieldComponent id="surname" type="text" label="Your surname" name="surname" />
            <FormFieldComponent id="email" type="email" label="Email" name="email" />
            <FormFieldComponent id="password" type="password" label="Password" name="password" />
            <div class="formFooter">
                <button type="submit" @click.prevent="handleSubmit(onSubmit)" :disabled="!meta.valid">Register</button>
                <router-link to="/login">I have account</router-link>
            </div>
        </Form>
    </div>
</template>

<style scoped>
    .register-component {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #3c3c3c;
        color: #ffb700;
        font-family: "arial", sans-serif;
    }

    .register-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 25px;
        width: 400px;
        background: #303030;
        border-radius: 5px;
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
