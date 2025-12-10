<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue";
import FilterComponent from "@/components/FilterComponent.vue";
</script>

<template>
    <div class="main-component">
        <HeaderComponent/>
        <div class="wrapper">
            <FilterComponent/>
            <div>
                <nav>
                    <ul>
                        <li><router-link to="/">Home</router-link></li>
                        <li><router-link to="/catalog">Catalog</router-link></li>
                        <li><router-link to="/new">New</router-link></li>
                        <li><router-link to="/popular">Popular</router-link></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<style scoped>
.main-component {
    min-height: 100vh;
    background: linear-gradient(to left, rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url("@/assets/images/main-bg.jpg") no-repeat center center fixed;
    background-size: cover;
}

.wrapper {
    display: flex;
    gap: 30px;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 40px;
    margin: 0;
    padding: 0;
    font-family: "Roboto", sans-serif;
}

nav ul li a {
    position: relative;
    color: #ffffff;
    text-decoration: none;
    font-size: 16px;
    transition: 0.3s;
}

nav ul li a:before {
    content: "";
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -4px;
    left: 0;
    background-color: #ffb700;
    transition: 0.3s;
}

nav ul li a:hover:before,
nav ul li a.router-link-active:before {
    width: 100%;
}
</style>
