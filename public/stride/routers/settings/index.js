// components
import attriubteGroup from "../../components/settings/attribute-groups.vue";
import addAttriubteGroup from "../../components/settings/add-attribute-groups.vue";
import loadCurrency from  "../../components/settings/load-currency.vue";
import loadLocale from  "../../components/settings/load-locale.vue";
import loadAttributes from "../../components/settings/load-attributes.vue";
import addAttribute from "../../components/settings/add-attribute.vue";
// const attriubteAndAttributeGroups = 


const settingsRoutes = [
    // ================ attribute groups ======================
    { path: "/attribute-groups", name: "attribute-groups", component: attriubteGroup },
    { path: "/attribute-group", name: "attribute-group", component: addAttriubteGroup },
    { path: "/attribute-group/:code/edit", name: "edit-attribute-group", component: addAttriubteGroup },
    // ================ Currency Locales ======================

    { path: "/currencies", name:"Currencies", component: loadCurrency},
    { path: "/locales", name:"locales", component: loadLocale },
    // ================ attribute Routes ======================
    { path: "/create-attribute", name: "create-attribute", component: addAttribute },
    { path: "/list-attributes", name: "list-attributes", component: loadAttributes },
    { path: "/list-categories", name: "list-categories", component: loadAttributes },
    { path: "/list-families", name: "list-families", component: loadAttributes },
    { path: "/list-association-types", name: "list-association-types", component: loadAttributes },
    

];

export default settingsRoutes;