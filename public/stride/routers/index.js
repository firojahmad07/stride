import router from "vue-router";

// components
import dashboard from "../components/pages/dashboard.vue";
import users from "../components/system/users.vue"
import userGroups from "../components/system/user-groups.vue"
import addRole from "../components/system/add-role.vue"
import roles from "../components/system/roles.vue"

// settings routes
var dashboardRouts = [
    { path: "/", name: "dashboard", component: dashboard },
    { path: "/users", name: "users", component: users },
    { path: "/user-groups", name: "user-groups", component: userGroups },
    { path: "/roles", name: "roles", component: roles },
    { path: "/add-role", name: "add-role", component: addRole }
];
export  default new router({
    routes: dashboardRouts
});