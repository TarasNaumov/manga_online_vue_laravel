<script setup>
import FormFieldComponent from "./FormFieldComponent.vue";
</script>

<template>
<div class="loginForm">
    <FormFieldComponent label="Email" id="email" type="email" name="email"/>
    <FormFieldComponent label="Password" id="password" type="password" name="password"/>
    <button>login</button>
</div>
</template>

<style scoped>

</style>
