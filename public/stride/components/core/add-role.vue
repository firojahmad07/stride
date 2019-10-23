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
                    <a href="#general" class="nav-link active" v-on:click="tab">General</a>
                    <a href="#permissions" class="nav-link" v-on:click="tab">Permissions</a>
                    <a href="#users" class="nav-link" v-on:click="tab">Users</a>
                </nav>
                <div class="role-tab-contents">
                    <div class="general-body" v-show="general">
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
                    <div class="permissions-body" v-show="permissions">
                          <div class="az-content az-content-mail">
                                <div class="container">
                                    <div class="az-content-left az-content-left-mail">

                                        <div class="az-content-header">
                                            <a href="" id="azNavbarShow" class="az-header-menu-icon"><span></span></a>
                                            <a href="index.html" class="az-logo">az<span>i</span>a</a>
                                            <a href="" id="azContentLeftHide" class="az-header-arrow">
                                            <i class="icon ion-md-arrow-forward d-sm-none"></i>
                                            <i class="icon ion-md-close d-none d-sm-block"></i>
                                            </a>
                                        </div><!-- az-content-header -->
                                        <div class="row row-sm">
                                            <div class="col-md-4 col-lg-3">
                                                <div class="pd-20 bg-gray-200">
                                                    <nav class="nav az-nav-column">
                                                    <a class="nav-link active" data-toggle="tab" href="#">Home</a>
                                                    <a class="nav-link" data-toggle="tab" href="#">About</a>
                                                    <a class="nav-link" data-toggle="tab" href="#">Features</a>
                                                    <a class="nav-link" data-toggle="tab" href="#">Services</a>
                                                    <a class="nav-link" data-toggle="tab" href="#">Blog</a>
                                                    <a class="nav-link" data-toggle="tab" href="#">Contact</a>
                                                    </nav>
                                                </div><!-- pd-10 -->
                                            </div><!-- col-3 -->
                                        </div><!-- row -->
                                    </div><!-- az-content-left -->
                                    <div class="az-content-body az-content-body-mail tab-content">
                                       <div id="tabCont1" class="tab-pane active show">
                                            <div class="az-mail-header">
                                            <div>
                                                <h4 class="az-content-title mg-b-5">Inbox</h4>                                        
                                            </div>
                                            </div><!-- az-mail-list-header -->
                                            <div class="az-mail-options">
                                                <label class="ckbox">
                                                    <input id="checkAll" type="checkbox">
                                                    <span></span>
                                                    <span> All</span>
                                                </label>
                                            </div><!-- az-mail-options -->

                                            <div class="az-mail-list">
                                                <div class="az-mail-item">
                                                    <div class="az-mail-checkbox">
                                                        <label class="ckbox">
                                                        <input type="checkbox">
                                                        <span></span>
                                                        <span>Create Product</span>
                                                        </label>
                                                    </div><!-- az-mail-checkbox -->
                                                </div><!-- az-mail-item -->

                                            </div><!-- az-mail-list -->
                                       </div>

                                        <div id="tabCont2" class="tab-pane">
                                            <div class="az-mail-header">
                                            <div>
                                                <h4 class="az-content-title mg-b-5">Inbox ee</h4>                                        
                                            </div>
                                            </div><!-- az-mail-list-header -->
                                            <div class="az-mail-options">
                                                <label class="ckbox">
                                                    <input id="checkAll" type="checkbox">
                                                    <span></span>
                                                    <span> All</span>
                                                </label>
                                            </div><!-- az-mail-options -->

                                            <div class="az-mail-list">
                                                <div class="az-mail-item">
                                                    <div class="az-mail-checkbox">
                                                        <label class="ckbox">
                                                        <input type="checkbox">
                                                        <span></span>
                                                        <span>Create Product</span>
                                                        </label>
                                                    </div><!-- az-mail-checkbox -->
                                                </div><!-- az-mail-item -->

                                            </div><!-- az-mail-list -->
                                       </div>

                                    </div><!-- az-content-body -->
                                </div><!-- container -->
                                </div><!-- az-content -->
                    </div><!-- general-->
                    <div class="users-body" v-show="users">
                        <div class="table-responsive">
                            <table class="table table-hover mg-b-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <label class="ckbox mg-b-5">
                                            <input type="checkbox" name="users[]" value="1" data-parsley-mincheck="2" 
                                            data-parsley-class-handler="#cbWrapper" data-parsley-errors-container="#cbErrorContainer"
                                            required>
                                        </label>
                                    </th>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>$170,750</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <th>
                                         <label class="ckbox mg-b-5">
                                            <input type="checkbox" name="users[]" value="1" data-parsley-mincheck="2" 
                                            data-parsley-class-handler="#cbWrapper" data-parsley-errors-container="#cbErrorContainer"
                                            required>
                                        </label>
                                    </th>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>$86,000</td>
                                    <td>example.com</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>$162,700</td>
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
export default {
    data: function() {
       return { 
           general: true,
           permissions: false,
           users: false
        }
    },
    methods: {
        tab:function(event){
            event.preventDefault();
            var currentElem = $(event.target);
            var tabContentId = currentElem.attr('href');
            currentElem.siblings().removeClass('active');
            currentElem.addClass('active');
            switch(tabContentId) {
                case "#general":
                    this.general = true;
                    this.permissions = false;
                    this.users = false;
                break;
                case "#permissions":
                    this.general = false;
                    this.permissions = true;
                    this.users = false;
                break;
                case "#users":
                    this.permissions = false;
                    this.users = true;
                    this.general = false;
                break;
            }
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