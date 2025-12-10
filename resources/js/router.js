import { createRouter, createWebHistory } from 'vue-router';

import RegisterComponent from "./components/RegisterComponent.vue";
import LoginComponent from "./components/LoginComponent.vue";
import MainComponent from "./components/MainComponent.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/register', component: RegisterComponent},
        { path: '/login', component: LoginComponent },
        { path: '/', component: MainComponent, alias: '/home' },
    ],
});

export default router;
