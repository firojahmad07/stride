<template>
    <div class="az-content az-content-dashboard-six">
      <header-menu></header-menu>
      <div class="az-content-body az-content-body-dashboard-six">
        <div class="col-sm-6 col-md-3 add-users">
            <router-link to = "/add-role" tag ="button" class = "btn btn-indigo save-btn btn-with-icon btn-block">
                <i class="typcn typcn-plus-outline"></i>Save      
            </router-link>
        </div>  
        <div class="table-responsive">
            <div class="az-content-body az-content-body-tab ">
                <nav class="nav az-nav-line">
                    <a href="#general" data-toggle="tab"  class="nav-link active">General</a>
                    <a href="#permissions" data-toggle="tab" class="nav-link">Permissions</a>
                    <a href="#users" data-toggle="tab" class="nav-link">Users</a>
                </nav>
                <div class="tab-content mg-t-20">
                    <div id="general" class="tab-pane active show">
                        <form data-parsley-validate>
                            <div class="wd-sm-300">
                                <div class="d-md-flex mg-b-20">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Code: <span class="tx-danger">*</span></label>
                                        <input type="text" name="firstname" class="form-control wd-250" placeholder="Enter firstname" required>
                                    </div><!-- form-group -->
                                </div><!-- form-group -->
                            </div><!-- d-flex -->
                        </form>
                    </div><!-- general-->
                    <div id="permissions" class="tab-pane">
                        <div class="container">
                            <div class="stride-content-permission-left">
                                <div class="stride-permission-menu">
                                    <nav class="stride-nav-column mg-b-20">                                  
                                    <a href="#" v-for="permissionsData in permissionsDatas" :key='permissionsData'
                                        :class='permissionsData.defaultActive' 
                                        @click.prevent="permissionTab(permissionsData.code)" :id='permissionsData.code'>
                                        <div class="stride-checkbox">
                                            <label class="ckbox">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        {{ permissionsData.label }}
                                    </a>
                                    </nav>                               
                                </div><!-- stride-permission-menu -->
                            </div><!-- az-content-left -->
                            <div class="az-content-body stride-tab-content tab-content">
                                <div :id="defaultActivePermission.code" class="tab-pane active show"
                                    >
                                        <div class="az-mail-header">
                                                <div>
                                                <h4 class="az-content-title mg-b-5">{{ defaultActivePermission.label }}</h4>
                                                </div>
                                            </div><!-- az-mail-list-header -->
                                            <hr>
                                    
                                            <div v-for="activePermission in defaultActivePermission.permissions" 
                                                :key="activePermission">
                                                <div class="stride-permission-item unread">
                                                    <div class="stride-checkbox">
                                                    <label class="ckbox">
                                                        <input type="checkbox" :value="activePermission.code">
                                                        <span></span>
                                                    </label>
                                                    </div>
                                                    <div class="az-mail-body">
                                                    
                                                    <div class="az-mail-subject">
                                                        {{ activePermission.title }}                                                        
                                                    </div>
                                                    </div>                
                                                    
                                                </div>           
                                            </div><!-- az-mail-list -->
                                </div>
                               
                            </div><!-- az-content-body -->
                        </div>
                    </div><!-- general-->
                    <div id="users" class="tab-pane">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>                          
                                    <tr v-for="user in userList" :key='user'>
                                        <td>
                                            <div class="stride-checkbox">
                                                <label class="ckbox">
                                                    <input type="checkbox" :value="user.id">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ user.firstName }}</td>
                                        <td>{{ user.lastName }}</td>
                                        <td>{{ user.email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- table-responsive -->
                    </div><!-- general-->
                </div>
            </div><!-- az-content-body -->
        </div><!-- table-responsive -->      
          
      </div><!-- az-content-body -->
    </div><!-- az-content -->
</template>
<script>
import axios from "axios";
import endPoints from "../../apiClient";

export default {
    data: function() {
       return {
           permissionsEdit: false,
           usersEdit: false,
           defaultActivePermission: [],
           permissionsDatas: [
               { 
                   code: "product",
                   permissions:  [
                       { code : "CREATE_PRODUCT", title : "Create Product"},
                       { code : "UPDATE_PRODUCT", title : "Update Product"},
                       { code : "DELETE_PRODUCT", title : "Delete Product"},
                       { code : "EDIT_PRODUCT", title : "Edit Product"},
                   ],
                   defaultActive: "nav-link active",
                   label: "Product"
               }, { 
                    code: "system",
                    permissions:  [
                       { code : "CREATE_USER", title : "Create User"},
                       { code : "UPDATE_USER", title : "Update User"},
                       { code : "DELETE_USER", title : "Delete User"},
                       { code : "EDIT_USER", title : "Edit User"},
                   ],
                   defaultActive: "nav-link",
                   label: "System"
               },
           ],
           userList: [],
        }
    },
    mounted() {
        this.defaultActivePermission = _.find(this.permissionsDatas, { defaultActive: 'nav-link active' });
        this.getUsers();
    },
    methods: {
       permissionTab(tabCode) {
        this.defaultActivePermission = _.find(this.permissionsDatas, { code: tabCode });
        var tabMenu    = $('.stride-permission-menu');
        tabMenu.find('#'+tabCode).addClass('active');
        tabMenu.find('#'+tabCode).siblings().removeClass('active');
       },
       getUsers()
       {
            axios.get(endPoints.STRIDE_GET_USERS).then(response => {
                if(200 === response.status) {
                this.userList = response.data;
                }
            }).catch(error => {
                console.log(error);
            });
       }
    }
}
</script>
<style>
.save-btn {
    cursor: pointer;
    width: 190px;
    float: right;
}
.role-tab-contents {
    margin-top: 20px;
}
</style>