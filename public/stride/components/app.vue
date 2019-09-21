<template>
    <div>
        <icon-bar></icon-bar>
        <side-bar></side-bar>
        <router-view></router-view>
    </div>
</template>

<script>
    import iconBar from "../components/common/iconbar.vue";
    import sideBar from "../components/common/sidebar.vue";

    export default {
        components: {iconBar, sideBar}
    }
</script>