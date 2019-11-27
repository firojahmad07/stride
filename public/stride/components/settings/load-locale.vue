<template>
	<div class = "az-content az-content-dashboard-six">
		<header-menu></header-menu>
		<div class="az-content-body az-content-body-dashboard-six">
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
              <tr>
                <th scope="row">1</th>
                <td>System Architect</td>
                <td>
                  <i class="typcn typcn-trash"></i>
                </td>
              </tr>
				  <tr>
                <th scope="row">1</th>
                <td>System Architect</td>
                <td>
                  <i class="typcn typcn-trash"></i>
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
	</div>
</template>
<script>
export default {

}
</script>