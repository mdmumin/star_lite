// import "bootstrap/dist/css/bootstrap.min.css";
import './bootstrap';
import { createApp } from 'vue';
import { backend_vue_routes } from './router';
// summerNoteStart
import "summernote/dist/summernote-lite.css";
import "summernote/dist/summernote-lite.js";
import jQuery from "jquery";
window.$ = window.jQuery = jQuery;
// summerNoteEnd

const app = createApp({});

import AppComponent from './views/layout/AppComponent.vue';


app.component('app-component', AppComponent);

app.use(backend_vue_routes);
app.mount('#app');
















// import "./bootstrap";
// import { createApp } from "vue";
// import {
//     createMemoryHistory,
//     createRouter,
//     createWebHashHistory,
// } from "vue-router";
// import axios from "axios";
// window.axios = axios;
// window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";


// // import { backend_vue_routes } from "./router";
// import AppComponent from "./views/layout/AppComponent.vue";
// import Dashboard from "./views/pages/Dashboard.vue";

// const app = createApp({});

// const router = createRouter({
//     history: createWebHashHistory(),
//     routes: [
//         {
//             path: "/",
//             component: AppComponent,
//             children: [
//                 {
//                     path: "dashboard",
//                     component: Dashboard,
//                 },
//             ],
//         },
//     ],
// });

// app.component("app", AppComponent);
// app.use(router);
// app.mount("#app");
