import router from "vue-router";

// components
import dashboard from "../components/pages/dashboard.vue";

export  default new router({
    mode: "history",
    routes: [
        { path: "/", name: "dashboard", component: dashboard }
    ]
});