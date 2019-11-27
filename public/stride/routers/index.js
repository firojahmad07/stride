import router from "vue-router";

// components
import dashboard from "../components/pages/dashboard.vue";
import users from "../components/core/users.vue"
import userGroups from "../components/core/user-groups.vue"
import addRole from "../components/core/add-role.vue"
import roles from "../components/core/roles.vue"

import currenyRoutes from  "../routers/settings/currency";
// settings routes
var settingsRoutes = [
    { path: "/", name: "dashboard", component: dashboard },
    { path: "/users", name: "users", component: users },
    { path: "/user-groups", name: "user-groups", component: userGroups },
    { path: "/roles", name: "roles", component: roles },
    { path: "/add-role", name: "add-role", component: addRole }
];
var allRoutes = [];
const dashboardRouts = allRoutes.concat(settingsRoutes, currenyRoutes);
export  default new router({
    routes: dashboardRouts
});