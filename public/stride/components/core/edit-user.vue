<template>
    <div class="az-content az-content-dashboard-six">
    <header-menu></header-menu>
        <div class="az-content-body az-content-body-dashboard-six">
            <div class="az-content az-content-profile">
                <div class="container mn-ht-100p">
                    <div class="az-content-left az-content-left-profile">

                    <div class="az-profile-overview">
                        <div class="az-img-user">
                        <img src="https://via.placeholder.com/500x500" alt="">
                        </div><!-- az-img-user -->
                        <div class="d-flex justify-content-between mg-b-20">
                        <div>
                            <h5 class="az-profile-name">Sophia White</h5>
                            <p class="az-profile-name-text">UI/UX Designer</p>
                        </div>
                        </div>

                        <div class="az-profile-bio">
                        Genius, Compiler, Powerful Multitasker, Fantasy Fruit Loop, 
                        Replacement President of a Major Soft Drink Manufacturer.
                        </div><!-- az-profile-bio -->

                        <hr class="mg-y-30">

                    </div><!-- az-profile-overview -->

                    </div><!-- az-content-left -->
                    <div class="az-content-body az-content-body-profile">
                    <nav class="nav az-nav-line">
                        <a href="#general" class="nav-link active" data-toggle="tab">General</a>
                        <a href="#aditional" class="nav-link" data-toggle="tab">Aditional</a>
                        <a href="#group-and-roles" class="nav-link" data-toggle="tab">Groups & Roles</a>
                        <a href="#password" class="nav-link" data-toggle="tab">Password</a>
                    </nav>

                    <div class="az-profile-body tab-content">
                        <div id="general" class="tab-pane active show">
                            <form data-parsley-validate>
                                <div class="wd-sm-300">
                                   <div class="d-md-flex mg-b-20" 
                                        v-for="generalForm in generalInfoForm" :key='generalForm'>
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">{{ generalForm.label }}: 
                                                <span v-if="generalForm.required" class="tx-danger">*</span>
                                            </label>
                                            <input v-if="getType(generalForm.types, 'stride_catalog_text')" type="text" name="firstname" 
                                                class="form-control wd-250" 
                                                :placeholder="generalForm.placeholder" required>
                                            <div v-else-if="getType(generalForm.types, 'stride_catalog_boolean')" class="az-toggle"><span></span></div>

                                        </div><!-- form-group -->
                                    </div><!-- form-group --> 
                                </div><!-- d-flex -->
                            </form>
                        </div><!-- general-->
                         <div id="aditional" class="tab-pane">
                            <form data-parsley-validate>
                                <div class="wd-sm-300">
                                    <div class="d-md-flex mg-b-20" 
                                        v-for="aditionalForm in aditionalInfoForm" :key='aditionalForm'>
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">{{ aditionalForm.label }}: 
                                                <span v-if="aditionalForm.required" class="tx-danger">*</span>
                                            </label>
                                            <input v-if="getType(aditionalForm.types, 'stride_catalog_text')" type="text" name="firstname" 
                                                class="form-control wd-250" 
                                                :placeholder="aditionalForm.placeholder" required>
                                            <div v-else-if="getType(aditionalForm.types, 'stride_catalog_boolean')" class="az-toggle"><span></span></div>
                                             <select class="form-control wd-250 select2"
                                                v-else-if="getType(aditionalForm.types, 'stride_catalog_select')">
                                                <option label="Choose one"></option>
                                                <option value="Firefox">Firefox</option>
                                                <option value="Chrome">Chrome</option>
                                                <option value="Safari">Safari</option>
                                                <option value="Opera">Opera</option>
                                                <option value="Internet Explorer">Internet Explorer</option>
                                            </select>
                                        </div><!-- form-group -->
                                    </div><!-- form-group -->                               

                                </div><!-- d-flex -->
                            </form>
                        </div><!-- general-->
                         <div id="group-and-roles" class="tab-pane">
                            <form data-parsley-validate>
                                <div class="wd-sm-300">
                                   <div class="d-md-flex mg-b-20" 
                                        v-for="groupsRolesForm in groupsAndRolesForm" :key='groupsRolesForm'>
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">{{ groupsRolesForm.label }}: 
                                                <span v-if="groupsRolesForm.required" class="tx-danger">*</span>
                                            </label>
                                            <select class="form-control wd-250 select2"
                                                v-if="getType(groupsRolesForm.types, 'stride_catalog_select')" multiple>
                                                <option label="Choose one"></option>
                                                <option value="Firefox">Firefox</option>
                                                <option value="Chrome">Chrome</option>
                                                <option value="Safari">Safari</option>
                                                <option value="Opera">Opera</option>
                                                <option value="Internet Explorer">Internet Explorer</option>
                                            </select>
                                        </div><!-- form-group -->
                                    </div><!-- form-group --> 
                                </div><!-- d-flex -->
                            </form>
                        </div><!-- general-->
                         <div id="password" class="tab-pane">
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
                    </div><!-- az-profile-body -->
                    </div><!-- az-content-body -->
                </div><!-- container -->
            </div><!-- az-content -->
        </div>
    </div>
</template>
<script>
import select2 from "select2";
export default {
    data() {
        return {
            userInfo: null,
            generalInfoForm : [
                { placeholder: "", types: ['stride_catalog_boolean'], label: "Status" },
                { placeholder: "Enter First Name", types: ['stride_catalog_text'], label: "First Name", required: true},
                { placeholder: "Enter Last Name", types: ['stride_catalog_text'], label: "Last Name", required: true},
                { placeholder: "Enter User Name", types: ['stride_catalog_text'], label: "User Name", required: true },
                { placeholder: "Enter Email", types: ['stride_catalog_text'], label: "Email", required: true},
            ],
            aditionalInfoForm : [
                { types: ['stride_catalog_select'], label: "UI locale", required: true },
                { types: ['stride_catalog_select'], label: "Catalog locale", required: true },
                { types: ['stride_catalog_select'], label: "Catalog scope", required: true },
                { types: ['stride_catalog_select'], label: "Default tree", required: true },
            ],
            groupsAndRolesForm : [
                { types: ['stride_catalog_select', 'stride_catalog_multi_select'], label: "User groups", required: false },
                { types: ['stride_catalog_select', 'stride_catalog_multi_select'], label: "Roles", required: true },
            ],
            // userId: this.$routes.userId,
            uiLocale: [],
        }
    },
    mounted() {
        // console.log(this.userId);
         $('.select2').select2({
            placeholder: 'Select'
          });
        console.log(" dafasdf : ", _.indexOf([1,2,3], 3));
    },
    methods: {
        getType : function(types, index) {
            // console.log('types : index ', types, index);
            return (-1 !== _.indexOf(types, index)) ? true : false;
        },

    }

}
</script>