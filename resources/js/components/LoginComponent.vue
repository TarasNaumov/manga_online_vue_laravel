<script setup>
import FormFieldComponent from "./FormFieldComponent.vue";
</script>

<template>
<div class="loginForm">
    <FormFieldComponent label="Email" id="email" type="email" name="email"/>
    <FormFieldComponent label="Password" id="password" type="password" name="password"/>
    <div>
        <button>login</button>
        <router-link to="/register">Create account</router-link>
    </div>

</div>
</template>

<style scoped>

</style>
