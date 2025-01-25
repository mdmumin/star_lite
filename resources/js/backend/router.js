import { createWebHashHistory, createRouter } from "vue-router";
import Dashboard from './views/Dashboard.vue'

/** Router List */
import user_management_router from "./views/pages/user_management/config/router.js";

import BlogAll from "./views/pages/blog_management/All.vue";
import BlogCreate from "./views/pages/blog_management/Create.vue";



export const routes = [
    { path: '', component: Dashboard, name: "Dashboard" },

    user_management_router, 


    
    { path: "/blog-all", component: BlogAll, name: "blogAll" },
    { path: "/blog-create", component: BlogCreate, name: "blogCreate" },
];

export const backend_vue_routes  = createRouter({
    history: createWebHashHistory(),
    routes,
});

// import {
//     createMemoryHistory,
//     createRouter,
//     createWebHashHistory,
// } from "vue-router";

// import Dashboard from "./views/pages/Dashboard.vue";

// // import UserAll from './views/pages/user_management/All.vue';
// // import UserCreate from './views/pages/user_management/Create.vue';

// export const backend_vue_routes = [
//     {
//         path: "dashboard",
//         component: Dashboard,
//     },

//     // { path: '/user-all', component: UserAll },
//     // { path: '/user-create', component: UserCreate },
// ];

// export const router = createRouter({
//     history: createWebHashHistory(),
//     routes: backend_vue_routes,
// });
