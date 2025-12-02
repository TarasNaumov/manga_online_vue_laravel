<script setup>
import FormFieldComponent from "./FormFieldComponent.vue";
</script>

<template>
<div class="registerForm">
    <FormFieldComponent id="name" type="text" label="Your name" name="name" />
    <FormFieldComponent id="surname" type="text" label="Your surname" name="surname" />
    <FormFieldComponent id="email" type="email" label="Email" name="email" />
    <FormFieldComponent id="password" type="password" label="Password" name="password" />
    <button>Register</button>
</div>
</template>

