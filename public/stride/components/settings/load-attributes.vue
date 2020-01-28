<template>
	<div class = "az-content az-content-dashboard-six">
		<header-menu></header-menu>
		<div class="az-content-body az-content-body-dashboard-six">
        <div class="az-content-breadcrumb">
            <span>Settings</span>
            <span>Attributes </span>
        </div>
        <div class="col-sm-6 col-md-3 add-users">
           <router-link :to="{ name: 'create-attribute' }" tag ="button"
              class = "btn btn-indigo save-btn btn-with-icon btn-block"> Create
            </router-link>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mg-b-0">
            <thead>
              <tr>
                <th>Label</th>
                <th>Type</th>
                <th>Group</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="attribute in attributes" :key="attribute.id">
                <td>{{ attribute.label }}</td>
                <td>{{ attribute.type }}</td>
                <td>{{ attribute.group }}</td>
                <td>
                  <router-link :to="{name: 'edit-attribute-group', params: { code : attribute.id }}">edit</router-link>
                </td>
              </tr>
            </tbody>
          </table>
        </div><!-- table-responsive -->
      </div><!-- az-content-body -->
	</div>
</template>
<script>
import axios from "axios";
import endPoints from "../../apiClient"; 

export default {
  data: function() {
    return {
      
      limit: "10",
      page: "1",
      search: "",  
      attributes: [
            {id: 1, label: "demo", type:"text", group:"other" },
            {id: 1, label: "demo2", type:"text", group:"other" },
            {id: 1, label: "demo3", type:"text", group:"other" },
            {id: 1, label: "demo4", type:"text", group:"other" }
          ]  
    }
  },
  computed(id = null){
    console.log('id : ', id);
  },
  
  created: function(id = null) {
    let requestParams = {
      options: {
          limit: this.limit,
          page: this.page,
          search: this.search,
        }
      }
     
  }
}
</script>