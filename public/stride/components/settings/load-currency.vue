<template>
	<div class = "az-content az-content-dashboard-six">
		<header-menu></header-menu>
		<div class="az-content-body az-content-body-dashboard-six">
        <div class="az-content-breadcrumb">
            <span>Settings</span>
            <span>Currencies</span>
        </div>
        <div class="az-content-label mg-b-5">
          <input type="text" class="form-control search-user" placeholder="Find Roles By Code" name="user">
        </div>
        <div class="table-responsive">
          <table class="table table-hover mg-b-0">
            <thead>
              <tr>
                <th>Code</th>
                <th>Status</th>
					 <th>Action</th>	
              </tr>
            </thead>
            <tbody>
              <tr v-for="currency in currencies" :key="currency.id">
                <th scope="row">{{ currency.id }}</th>
                <td>{{ currency.code }} ({{ currency.countryName }})</td>
                <td>
                  <div class="az-toggle"><span></span></div>
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
      currencies: []  
    }
  },
  created: function() {
    let requestParams = {
      options: {
          limit: this.limit,
          page: this.page,
          search: this.search,
        }
      }
      axios.get(endPoints.STRIDE_LOAD_CURRENCY, 
        { params: requestParams})
        .then(response => {
          if(200 === response.status) {
            this.currencies = response.data;
          }
        }).catch(error =>  {
        console.log('error : ',error);
      });
    
  }
}
</script>