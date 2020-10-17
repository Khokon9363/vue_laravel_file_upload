import Vue from 'vue'
import VueRouter from 'vue-router'
import ViewComponent from "./components/ViewComponent";
import AddComponent from "./components/AddComponent";

Vue.use(VueRouter)


const router  = new VueRouter({
    mode : 'history',
    routes : [
        {
            path      : '/',
            component : ViewComponent
        },
        {
            path      : '/add',
            component : AddComponent
        }
    ]
})

export default router
