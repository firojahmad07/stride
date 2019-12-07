/**
 * all assets CSS, js
 */
import "./layouts/layout";
/**
 * define all global components to reuse
 */
import "./constants/globalComponents";
/**
 * vue components
 */
import vueRouter from "vue-router";
import store from "./store";
import vue from "vue";
// import select2 from "select2";
// Vue.use()
vue.use(vueRouter);
// vue.use(select2);
import routers from './routers';

import app from "./components/app.vue";
// import login from "./components/secure/login.vue"
new vue({
    el: "#vue_app",
    store,
    router: routers,
    render: h => h(app) 
});