<template>
    <div class="az-content az-content-dashboard-six">
      <header-menu></header-menu>
      <div class="az-content-body az-content-body-dashboard-six">
        <div class="col-sm-6 col-md-3 add-users">
           <b-button v-b-modal.add-user-modal variant="primary" data-toggle="modal" 
            data-target="#modaldemo3" class="btn btn-indigo add-users"> 
              <i class="typcn typcn-plus-outline"></i> Add User</b-button>
        </div>
         
         

        <div class="az-content-label mg-b-5">
          <input type="text" class="form-control search-user" placeholder="find user by email" name="user">
        </div>
        <div class="table-responsive">
          <table class="table table-hover mg-b-0">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <th scope="row"> {{ user.id }}</th>
                <td> {{ user.firstName }} </td>
                <td> {{ user.lastName }} </td>
                <td> {{ user.email }} </td>
                <td>
                  <div class="btn-icon-list">
                    <button class="btn btn-md btn-indigo btn-icon"><i class="typcn typcn-edit"></i></button>
                    <button class="btn btn-md btn-danger btn-icon"><i class="typcn typcn-trash"></i></button>                 
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div><!-- table-responsive -->
        
          <div class="mg-lg-b-30 pagination-wrapper">
            <ul class="pagination pagination-circled">
                <li class="page-item"><a class="page-link" href="#"><i class="typcn typcn-chevron-left-outline"></i></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="typcn typcn-chevron-right-outline"></i></a></li>
              </ul>
          </div>
      </div><!-- az-content-body -->

       <!-- LARGE MODAL -->  <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
              <div class="modal-header">
                <h6 class="modal-title">Create New User</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="create-user-form" action="/create-user" method="post"
                    @submit="addUser" data-parsley-validate novalidate>
                  <div class="wd-sm-300">
                    <div class="d-md-flex mg-b-20">
                      <div class="form-group mg-b-0">
                        <label class="form-label">Firstname: <span class="tx-danger">*</span></label>
                        <input type="text" name="firstname" v-model="user.firstName" class="form-control wd-350"
                          data-parsley-maxlength="40" placeholder="Enter firstname" required>
                      </div><!-- form-group -->
                      <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                        <label class="form-label">Lastname: <span class="tx-danger">*</span></label>
                        <input type="text" name="lastname" v-model="user.lastName" class="form-control wd-350"
                          data-parsley-maxlength="40" placeholder="Enter lastname" required>
                      </div><!-- form-group -->
                    </div><!-- d-flex -->

                    <div class="d-md-flex mg-b-20">
                        <div class="form-group mg-b-0">
                          <label class="form-label">User Name: <span class="tx-danger">*</span></label>
                          <input type="text" name="firstname" v-model="user.userName" class="form-control wd-350" placeholder="Enter User Name" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                          <label class="form-label">Email: <span class="tx-danger">*</span></label>
                          <input type="text" name="lastname" v-model="user.email" class="form-control wd-350" placeholder="Enter Email" required>
                        </div><!-- form-group -->
                    </div><!-- d-flex -->

                     <div class="d-md-flex mg-b-20">
                        <div class="form-group mg-b-0">
                          <label class="form-label">Password: <span class="tx-danger">*</span></label>
                          <input type="Password" name="firstname" v-model="user.password" class="form-control wd-350" placeholder="Enter Password" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                          <label class="form-label">Confirm Password: <span class="tx-danger">*</span></label>
                          <input type="password" name="lastname" v-model="user.cPassword" class="form-control wd-350" placeholder="Enter Password Again" required>
                        </div><!-- form-group -->
                      </div><!-- d-flex -->


                  </div>
                </form>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="button" class="btn btn-indigo">Save changes</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
    </div><!-- az-content -->
</template>

<script>
    export default {
      data() { 
        return {
          user: {
              userName: '',
              firstName: '',
              lastName: '',
              password: '',
              cPassword: '',
              email: ''
          },
          users: [
              {   
                  id: 1,
                  firstName: "John",
                  lastName: "Doe",
                  email: 'johndoe@example.com'
              },
              {   
                  id: 2,
                  firstName: "Villiam",
                  lastName: "Smith",
                  email: 'villiam@example.com'
              },
              {   
                  id: 3,
                  firstName: "Mark",
                  lastName: "Wood",
                  email: 'mark@example.com'
              },
            ],
        }
      },
      created(){
        this.initForm();
      },
      
      methods: {
        addUser:function(e){
          e.preventDefault();
          console.log('user data : ', this.user);
        },
         initForm: function(){
           console.log('onload');
           console.log(this.$store.state.testMessage);
           $('#create-user-form').parsley();
         }
      }
    }
</script>
<style>
  .add-users {
    float:right;
  }
  .search-user{
    border: none;
    border-bottom: 1px solid #6610f2;
    margin-bottom: 56px;
    background: #f8f9fa;
  }
  .pagination-wrapper{
    margin-top: 30px;
    float:right;
  }
</style>