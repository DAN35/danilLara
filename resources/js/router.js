import {createRouter, createWebHashHistory} from "vue-router";
import Home from "./pages/Home.vue"
import Employee from "./pages/Employee.vue"
import Settings from "./pages/Settings.vue"
import Filters from "./pages/Filters.vue"


export default createRouter({
    history: createWebHashHistory(),
    routes: [
        {path: '/', name: 'home', component: Home},
        {path: '/employee', name: 'employee', component: Employee},
        {path: '/settings', name: 'settings', component: Settings},
        {path: '/filters', name: 'filters', component: Filters},
    ]
});
