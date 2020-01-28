// components
import dashboard from "../../components/pages/dashboard.vue";
import users from "../../components/core/users.vue";
import userGroups from "../../components/core/user-groups.vue";
import addRole from "../../components/core/add-role.vue";
import roles from "../../components/core/roles.vue";
import editUser from "../../components/core/edit-user.vue";

const systemRoutes = [
    { path: "/", name: "dashboard", component: dashboard },
    { path: "/users", name: "users", component: users },
    { path: "/edit-user/:userId", name: "edit-user", component: editUser },
    { path: "/user-groups", name: "user-groups", component: userGroups },
    { path: "/roles", name: "roles", component: roles },
    { path: "/add-role", name: "add-role", component: addRole }
];

export default systemRoutes;