import { createWebHashHistory, createRouter } from "vue-router";
import Dashboard from './views/Dashboard.vue'

/** Router List */
import user_management_router from "./views/pages/user_management/config/router.js";
import blog_management_router from "./views/pages/blog_management/config/router.js";

import BlogAll from "./views/pages/blog_management/All.vue";
import BlogCreate from "./views/pages/blog_management/Create.vue";



export const routes = [
    { path: '', component: Dashboard, name: "Dashboard" },

    user_management_router, 
    blog_management_router,


    
    { path: "/blog-all", component: BlogAll, name: "blogAll" },
    { path: "/blog-create", component: BlogCreate, name: "blogCreate" },
];

export const backend_vue_routes  = createRouter({
    history: createWebHashHistory(),
    routes,
});


