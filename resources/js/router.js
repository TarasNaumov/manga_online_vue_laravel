import { createRouter, createWebHistory } from 'vue-router';

import RegisterComponent from "./components/RegisterComponent.vue";
import LoginComponent from "./components/LoginComponent.vue";
import CategoryComponent from "./components/CategoryComponent.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/register', component: RegisterComponent},
        { path: '/login', component: LoginComponent },
        { path: '/categories', component: CategoryComponent, alias: '/' },
    ],
});

export default router;
