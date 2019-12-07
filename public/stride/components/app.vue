<template>
    <div>
        <icon-bar v-bind:icon-bars="iconBars"></icon-bar>
        <side-bar></side-bar>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    data() {
        return {
            iconBars: [ /** layouts */ {
                    link: "#asideUIElements",
                    class: "nav-link",
                    icon: "typcn typcn-book",
                    label: "Store"
                }, /** products */ {
                    link: "#",
                    class: "nav-link",
                    icon: "typcn typcn-th-list-outline",
                    label: "Products"
                }, /** settings */ {
                    link: "#asideSettings",
                    class: "nav-link",
                    icon: "typcn typcn-cog-outline",
                    label: "Settings"
                }, /** system */ {
                    link: "#asideSystem",
                    class: "nav-link",
                    icon: "typcn typcn-th-small-outline",
                    label: "System"
                }

            ]
        }
    }
}
</script>