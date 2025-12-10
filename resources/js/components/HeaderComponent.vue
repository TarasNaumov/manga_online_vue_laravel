<script setup>
import { ref } from "vue";

const isLoggedIn = ref(false);

if (localStorage.getItem('auth_token')) {
    isLoggedIn.value = true;
}
</script>

<template>
    <header class="app-header">
        <div class="wrapper">
            <router-link to="/" class="logo">
                <img src="@/assets/images/logo.png" alt="NF">
            </router-link>
            <nav>
                <input type="text" name="search" placeholder="Search..." />
                <div>
                    <div v-show="">
                        <router-link to="/login">Login</router-link>
                        <router-link to="/register">Register</router-link>
                    </div>
                    <router-link to="/profile">Profile</router-link>
                </div>
            </nav>
        </div>
    </header>
</template>

<style scoped>
.app-header {
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background-color: #2c2c2c;
    margin-bottom: 30px;
}

.wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    background-color: #2c2c2c;
}

.logo img {
    height: 50px;
    vertical-align: middle;
    object-fit: cover;
}

nav {
    display: flex;
    align-items: center;
    gap: 20px;
}

nav input {
    padding: 8px 12px;
    border-radius: 4px;
    border: 2px solid #ff8000;
    font-size: 14px;
    color: #fff;
    outline: none;
}
</style>
