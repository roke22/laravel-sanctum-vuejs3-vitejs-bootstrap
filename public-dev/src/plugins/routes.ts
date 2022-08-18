import {createRouter, createWebHistory} from 'vue-router'
import { authUserStore } from '../store/authUser'
import LoginVue from '../components/Login.vue'
import PageNotFoundVue from '../components/PageNotFound.vue'
import DashboardVue from '../components/dashboard/Dashboard.vue'
import ForgotPasswordVue from '../components/ForgotPassword.vue'
import ResetPasswordVue from '../components/ResetPassword.vue'

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/", 
            name: "login", 
            component: LoginVue,
            meta: {
                auth: false
            }
            
        },
        {
            path: "/forgot-password", 
            name: "forgot-password", 
            component: ForgotPasswordVue,
            meta: {
                auth: false
            }
            
        },
        {
            path: "/reset-password/:token",
            name: "reset-password",
            component: ResetPasswordVue,
            meta: {
                auth: false
            }
        },
        {
            path: "/dashboard",
            name: "dashboard",
            component: DashboardVue,
            meta: {
                auth: true
            }
        },
        { 
            path: "/:pathMatch(.*)*",
            name:"notFound",
            component: PageNotFoundVue ,
            meta: {
                auth: false
            }
        }
    ]
})

router.beforeEach(async (to, from) => {
    if (!to.meta.auth) {
        return true
    }

    if (to.meta.auth && authUserStore().isAutenticated) {
        return true
    }

    return { name: 'login'}
})
