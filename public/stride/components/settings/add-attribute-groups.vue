<template>
    <div class="az-content az-content-dashboard-six">
      <header-menu></header-menu>
      <div class="az-content-body az-content-body-dashboard-six">
        <div class="az-content-breadcrumb">
            <span>Settings</span>
            <span>Attribute Groups</span>
        </div>
        <div class="col-sm-6 col-md-3 add-users">
            <button class = "btn btn-indigo btn-block" v-on:click="createAttributeGroup">Save      
            </button>
        </div>  
        <div class="table-responsive">
            <div class="az-content-body az-content-body-tab ">
                <nav class="nav az-nav-line">
                    <a href="#general" data-toggle="tab" class="nav-link active">General</a>
                    <a href="#attriubtes" data-toggle="tab" class="nav-link" v-if="isAttributes">Attributes</a>
                </nav><br>
                <div class="tab-content">
                    <div id="general" class="tab-pane active show">
                        <form data-parsley-validate>
                            <div class="wd-sm-300">
                                <div class="d-md-flex mg-b-20">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Code: <span class="tx-danger">*</span></label>
                                        <input type="text" name="firstname" v-model="attributeGroup.code" 
                                        class="form-control wd-250" placeholder="Attribute group code" :disabled="isAttributes">
                                    </div><!-- form-group -->
                                </div><!-- form-group -->
                            </div><!-- d-flex --><br>
                            <h3>Label Translations </h3>
                            <hr>
                            <div class="wd-sm-300">
                                <div class="d-md-flex mg-b-20">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Title: <span class="tx-danger">*</span></label>
                                        <input type="text" name="firstname" v-model="attributeGroup.label" class="form-control wd-250" placeholder="Attribute group title" required>
                                    </div><!-- form-group -->
                                </div><!-- form-group -->
                            </div><!-- d-flex -->
                        </form>
                    </div><!-- general-->
                    <div id="attriubtes" class="tab-pane">
                         <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <select class="form-control select2">
                                <option label="Choose one"></option>
                                <option value="Firefox">Firefox</option>
                                <option value="Chrome">Chrome</option>
                                <option value="Safari">Safari</option>
                                <option value="Opera">Opera</option>
                                <option value="Internet Explorer">Internet Explorer</option>
                            </select>
                        </div><!-- col-4 -->
                        <div class="table-responsive">
                            <table class="table table-hover mg-b-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
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
import select2 from "select2";

export default {
    data: function() {
       return { 
           attributeGroupCode: this.$route.params.code,
           isAttributes: false,
           attributeGroup: {
               code:'',
               label:'',
               attributes:{}
           }
        }
    },
    mounted() {
        $('.select2').select2({
            placeholder: 'Choose one'
          });
        console.log('kkkkk', $('.select2'));
        this.isAttributes = _.isUndefined(this.attributeGroupCode) ? false : true;
        if(!_.isUndefined(this.attributeGroupCode)) {
            this.getAttributeGroup();
        }
    },
    methods: {
       createAttributeGroup() {
           if(!_.isUndefined(this.attributeGroupCode)) {
               this.attributeGroup.id = this.attributeGroupCode;
           };
           axios.post(endPoints.STRIDE_CREATE_ATTRIBUTE_GROUPS, this.attributeGroup).then(resp => {
               var data = resp.data;
               this.$router.push({ name : 'edit-attribute-group', params : {'code' : data.code }});
           }).catch(errors => {

           });
       },
       getAttributeGroup() {
            console.log(this.attributeGroup);

            axios.get(endPoints.STRIDE_GET_ATTRIBUTE_GROUP, { params: {attributeGroupCode: this.attributeGroupCode }}).then(response =>{
                console.log(response, this.attributeGroup);
                this.attributeGroup = response.data;
            //    if(200 === response.code) {
            //        console.log(this.attributeGroup);
            //    }
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