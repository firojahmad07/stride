<template>
    <div class="az-iconbar">
      <a href="/" class="az-iconbar-logo"><i class="typcn typcn-chart-bar-outline"></i></a>
      <nav class="nav">
        <a href="#asideUIElements" class="nav-link" v-on:click="openSidebar"><i class="typcn typcn-book"></i></a>
        <a href="#" class="nav-link" ><i class="typcn typcn-folder-add"></i></a>
        <a href="#asideSettings" class="nav-link" v-on:click="openSidebar"><i class="typcn typcn-map"></i></a>
        <a href="#asideSystem" class="nav-link" v-on:click="openSidebar"><i class="typcn typcn-th-large-outline"></i></a>
      </nav>
    </div><!-- az-iconbar -->
</template>
<script>
  export default {
    name: "iconbar",
    data: function(){
      return {
      };
    },
    methods: {
        openSidebar: function(e) {
          e.preventDefault();
          $(e.target).closest('.nav-link').addClass('active');
          $(e.target).closest('.nav-link').siblings().removeClass('active');
          $('.az-iconbar-aside').addClass('show');
          var targ = $(e.target).closest('.nav-link').attr('href');
          $(targ).addClass('show');
          $(targ).siblings().removeClass('show');
          $('az-iconbar-aside').addClass('show');

        }
    },
    created() {
        // initialize function insides
        // this.initIcanBar();
    },
  }
</script>