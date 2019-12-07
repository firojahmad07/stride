<template>
    <div class="az-iconbar">
      <a href="/" class="az-iconbar-logo"><i class="typcn typcn-chart-bar-outline"></i></a>
      <nav class="nav">
        <a v-for="iconBar in iconBars" :key="iconBar.label"
           :href="iconBar.link" :class="iconBar.class" v-on:click="openSidebar">
          <i :class="iconBar.icon"></i> 
          <span class="iconLabel">{{ iconBar.label }}</span>
        </a>
      </nav>
    </div><!-- az-iconbar -->
</template>
<script>
  export default {
    name: "iconbar",
    props: {
      iconBars:{
        type: Array
      }
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
  }
</script>
<style scoped>
  .iconLabel {
    color:#494c56;
  }
</style>