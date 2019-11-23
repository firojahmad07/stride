<template>
     <div class="az-iconbar-aside">
      <div class="az-iconbar-header">
        <a href="/" class="az-logo">az<span>i</span>a</a>
        <a href="#" class="az-iconbar-toggle-menu">
          <i class="typcn typcn-arrow-left-outline" v-on:click="closeSideBar"></i>
          <i class="icon ion-md-close"></i>
        </a>
      </div><!-- az-iconbar-header -->
      <div class="az-iconbar-body">
        <div id="asideUIElements" class="az-iconbar-pane">
          <h6 class="az-iconbar-title">Layouts Management</h6>
          <small class="az-iconbar-text">Create page, navigation and much more</small>
          <nav class="nav">
            <a href="elem-accordion.html" class="nav-link">Pages</a>
            <a href="elem-alerts.html" class="nav-link">Menu</a>
          </nav>
        </div><!-- az-iconbar-pane -->
        <div id="asideSettings" class="az-iconbar-pane">
          <h6 class="az-iconbar-title">Settings</h6>
          <small class="az-iconbar-text">Settings Navigation.</small>
          <nav class="nav">
            <a href="map-google.html" class="nav-link">Attributes</a>
            <a href="map-leaflet.html" class="nav-link">Attribute Groups</a>
            <a href="map-vector.html" class="nav-link">Categories</a>
            <a href="map-vector.html" class="nav-link">Families</a>
            <a href="map-vector.html" class="nav-link">Association Types</a>
            <a href="map-vector.html" class="nav-link">Currencies</a>
            <a href="map-vector.html" class="nav-link">Locales</a>
            <a href="map-vector.html" class="nav-link">Channels</a>
          </nav>
        </div><!-- az-iconbar-pane -->
        <div id="asideSystem" class="az-iconbar-pane">
          <h6 class="az-iconbar-title">System</h6>
          <small class="az-iconbar-text">A collection basic to advanced table design that you can use to your data.</small>
          <nav class="nav">
            <a href="table-basic.html" class="nav-link">Configuration</a>
            <a href="#" class="nav-link">API connections</a>
            <br>
            <small class="az-iconbar-text">User Management.</small>
            <router-link to = "/users" tag = "a" class="nav-link">Users</router-link>
            <router-link to = "/user-groups" tag = "a" class="nav-link">User Groups</router-link>
            <router-link to = "/roles" tag = "a" class="nav-link">Roles</router-link>
          </nav>
        </div><!-- az-iconbar-pane -->
      </div><!-- az-iconbar-body -->
    </div><!-- az-iconbar-aside -->
</template>

<script>
export default {
  methods: {
    closeSideBar: function(e) {
      e.preventDefault();
      $('.az-iconbar-aside').removeClass('show');
    }
  }
}
</script>