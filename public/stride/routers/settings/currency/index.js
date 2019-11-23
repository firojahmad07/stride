// currency related all routes
// const routerRootPath = "../../../";
import loadCurrency from "@/components/settings/load-Currency.vue";
// import loadCurrency from concat(routerRootPath, "components/settings/load-currency.vue");


// routes
const currencyRoutes = [
    { path: "/currencies", name:"currencies", component: loadCurrency}
];


export default currencyRoutes;