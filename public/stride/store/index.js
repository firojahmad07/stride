import Vue from "vue";
import Vuex from "vuex";
import Axios from "axios";
import userModule from "./core/userModule";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        userModule: userModule
    },
    state: {
        testMessage: "reached in store vuex",
    },
    mutations: {

    },
    actions: {

    },
    getters: {

    }
});

export default store;