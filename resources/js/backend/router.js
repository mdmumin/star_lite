import { createWebHashHistory, createRouter } from "vue-router";
import Dashboard from './views/Dashboard.vue'

/** Router List */
import user_management_router from "./views/pages/user_management/user/config/router.js";
// blog management
import blog_management_router from "./views/pages/bolg_management/blog/config/router.js";
import blog_category_management_router from "./views/pages/bolg_management/blog_category/config/router.js";
import blog_category_blog_management_router from "./views/pages/bolg_management/blog_category_blog/config/router.js";
import blog_tag_management_router from "./views/pages/bolg_management/blog_tag/config/router.js";
import blog_tag_blog_management_router from "./views/pages/bolg_management/blog_tag_blog/config/router.js";
import blog_comment_management_router from "./views/pages/bolg_management/blog_comment/config/router.js";
import blog_like_management_router from "./views/pages/bolg_management/blog_like/config/router.js";
import blog_view_management_router from "./views/pages/bolg_management/blog_view/config/router.js";

// common_management
import common_banner_management_router from "./views/pages/common_management/banner/config/router.js";
import common_team_management_router from "./views/pages/common_management/team/config/router.js";
import common_testimonial_management_router from "./views/pages/common_management/testimonial/config/router.js";
import common_about_us_management_router from "./views/pages/common_management/about_us/config/router.js";
import common_at_a_glance_management_router from "./views/pages/common_management/at_a_glance/config/router.js";
import common_mission_vission_management_router from "./views/pages/common_management/mission_vission/config/router.js";

// Property management
import property_management_property_router from "./views/pages/property_management/property/config/router.js";
import property_management_property_category_router from "./views/pages/property_management/property_category/config/router.js";
import property_management_property_tag_router from "./views/pages/property_management/property_tag/config/router.js";
import property_management_property_label_router from "./views/pages/property_management/property_label/config/router.js";

// import BlogAll from "./views/pages/blog_management/blog/All.vue";
// import BlogCreate from "./views/pages/blog_management/blog/Create.vue";



export const routes = [
    { path: '', component: Dashboard, name: "Dashboard" },
    // user Management
    user_management_router, 
    // blog Management
    blog_management_router,
    blog_category_management_router,
    blog_tag_management_router,
    blog_category_blog_management_router,
    blog_tag_blog_management_router,
    blog_comment_management_router,
    blog_like_management_router,
    blog_view_management_router,

    //common_management
    common_banner_management_router,
    common_team_management_router,
    common_testimonial_management_router,
    common_about_us_management_router,
    common_at_a_glance_management_router,
    common_mission_vission_management_router,

    //property management
    property_management_property_router,
    property_management_property_category_router,
    property_management_property_tag_router,
    property_management_property_label_router,

    // { path: "/blog-all", component: BlogAll, name: "blogAll" },
    // { path: "/blog-create", component: BlogCreate, name: "blogCreate" },
];

export const backend_vue_routes  = createRouter({
    history: createWebHashHistory(),
    routes,
});


