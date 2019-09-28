<template>
    <div class="az-content az-content-dashboard-six">
      <header-menu></header-menu>
      <div class="az-content-body az-content-body-dashboard-six">
        <div class="col-sm-6 col-md-3 add-users"><button class="btn btn-indigo btn-with-icon btn-block">
          <i class="typcn typcn-plus-outline"></i>Add Groups</button>
        </div>
         
         

        <div class="az-content-label mg-b-5">
          <input type="text" class="form-control search-user" placeholder="Find Groups By Code" name="user">
        </div>
        <div class="table-responsive">
          <table class="table table-hover mg-b-0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>
                  <i class="typcn typcn-edit"></i>
                  <i class="typcn typcn-trash"></i>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>$170,750</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>$86,000</td>
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
    </div><!-- az-content -->
</template>

<script>
    export default {
      
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