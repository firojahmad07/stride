// components
import attriubteGroup from "../../../components/settings/attribute-groups.vue";
import addAttriubteGroup from "../../../components/settings/add-attribute-groups.vue";

const attriubteAndAttributeGroups = [
    { path: "/attribute-groups", name: "attribute-groups", component: attriubteGroup },
    { path: "/attribute-group", name: "attribute-group", component: addAttriubteGroup },
    { path: "/attribute-group/:code/edit", name: "edit-attribute-group", component: addAttriubteGroup }
];

export default attriubteAndAttributeGroups;