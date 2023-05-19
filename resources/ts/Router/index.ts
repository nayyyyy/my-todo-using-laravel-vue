import {createRouter, createWebHashHistory} from "vue-router"
import Index from "../Pages/Todo/Index.vue"

const routes = [
    {
        path: '',
        name: 'Index',
        component: Index
    }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes
})

export default router
