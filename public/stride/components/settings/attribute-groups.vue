<template>
	<div class = "az-content az-content-dashboard-six">
		<header-menu></header-menu>
		<div class="az-content-body az-content-body-dashboard-six">
        <div class="az-content-breadcrumb">
            <span>Settings</span>
            <span>Attribute Groups</span>
        </div>
        <div class="col-sm-6 col-md-3 add-users">
           <router-link :to="{ name: 'attribute-group' }" tag ="button"
              class = "btn btn-indigo save-btn btn-with-icon btn-block"> Create
            </router-link>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mg-b-0">
            <thead>
              <tr>
                <th>Code</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="attrGroup in attributeGroups" :key="attrGroup.id">
                <td>{{ attrGroup.code }}</td>
                <td>
                  <router-link :to="{name: 'edit-attribute-group', params: {code : attrGroup.code}}">edit</router-link>
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
      attributeGroups: []  
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
      axios.get(endPoints.STRIDE_LOAD_ATTRIBUTE_GROUPS, 
        { params: requestParams})
        .then(response => {
          // console.log(__.isEmpty(response.data));
          if(200 === response.status) {
            this.attributeGroups = response.data;
          }
        }).catch(error =>  {
        console.log('error : ',error);
      });
    
  }
}
</script>