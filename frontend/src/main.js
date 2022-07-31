import { createApp } from 'vue'
import {createRouter,createWebHistory} from "vue-router";
import App from './App.vue'
import LoginPage from "@/components/LoginPage";
import RegisterPage from "@/components/RegisterPage";
import DashboardPage from "@/components/DashboardPage";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/login',component: LoginPage},
        { path: '/dashboard',component: DashboardPage},
        { path: '/register',component: RegisterPage , alias: '/'},
    ]
});

const app = createApp(App)

app.use(router)

app.mount('#app')
