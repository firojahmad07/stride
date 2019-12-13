import router from "vue-router";

import settingsRoutes from "../routers/settings";
import systemRoutes from "../routers/system";

var allRoutes = [];
const dashboardRouts = allRoutes.concat(
    settingsRoutes,
    systemRoutes, 
);

export  default new router({
    routes: dashboardRouts
});