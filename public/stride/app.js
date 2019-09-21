import "./layouts/layout";
import vueRouter from "vue-router";
import vue from "vue";

vue.use(vueRouter);
import routers from './routers';

import app from "./components/app.vue";
import login from "./components/secure/login.vue"
new vue({
    el: "#vue_app",
    router: routers,
    render: h => h(login) 
});