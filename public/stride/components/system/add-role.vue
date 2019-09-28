<template>
    <div class="az-content az-content-dashboard-six">
        <header-menu></header-menu>
        <div class="az-content-body az-content-body-profile">
            <nav class="nav az-nav-line">
                <a href="#general" class="nav-link active" v-on:click="tab">General</a>
                <a href="#permissions" class="nav-link" v-on:click="tab">Permissions</a>
                <a href="#users" class="nav-link" v-on:click="tab">Users</a>
            </nav>

            <div class="general-body show" id="general">
                <h1>general</h1>
            </div><!-- general-->
            <div class="permissions-body hide" id="permissions">
                <h1>permissions</h1>
            </div><!-- general-->
            <div class="users-body hide" id="users">
                <h1>users</h1>
            </div><!-- general-->
        </div><!-- az-content-body -->
    </div>
</template>
<script>
export default {
    data: {

    },
    methods: {
        tab:function(event){
            event.preventDefault();
            var currentElem = $(event.target);
            currentElem.addClass('active');
            var tabContentId = currentElem.attr('href');
            currentElem.siblings().removeClass('active');

            $(tabContentId).siblings().addClass('hide');
            $(tabContentId).addClass('show');
            // $(tabContentId).siblings().addClass('hide');
            // $(tabContentId).removeClass('show');
                // $(tabContentId).rClass('show');
            // console.log('');
        }
    }
}
</script>
<style>
.hide {
    display: none;
}
</style>