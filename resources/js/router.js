import { createRouter, createWebHistory } from 'vue-router';

import RegisterComponent from "./components/RegisterComponent.vue";
import LoginComponent from "./components/LoginComponent.vue";
import PlaceholderComponent from "@/components/PlaceholderComponent.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/register', name: 'register', component: RegisterComponent},
        { path: '/login', name: 'login', component: LoginComponent },
    ],
});

export default router;
