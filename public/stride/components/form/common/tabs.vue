<template>
    <div class="az-content-body az-content-body-tab ">
        <nav class="nav az-nav-line">
            <a href="#general" data-toggle="tab" class="nav-link active">Properties</a>
            <a href="#attriubtes" data-toggle="tab" class="nav-link" v-if="isAttributes">Attributes</a>
        </nav><br>
        <div class="tab-content">
            <div id="general" class="tab-pane active show">
                <form data-parsley-validate>
                    <div class="wd-sm-300" v-for="attributeForm in addAttributeForm" :key='attributeForm'>
                        <div class="d-md-flex mg-b-20">
                            <div class="form-group mg-b-0">
                                <label class="form-label">{{ attributeForm.label }} : 
                                    <span class="tx-danger" v-if="attributeForm.required"> *</span></label>
                                
                                <input v-if="getValidType(attributeForm.types, 'stride_catalog_text')" 
                                    type="text" name="firstname" class="form-control wd-250" 
                                    :placeholder="attributeForm.placeholder" required>

                                <select class="select2" 
                                    v-else-if="getValidType(attributeForm.types, 'stride_catalog_select')">
                                    <option><i class="typcn typcn-cog-outline"></i> Text</option>
                                    <option>Textarea</option>
                                    <option>Select</option>
                                    <option>Multi Select</option>
                                    
                                </select>
                            </div><!-- form-group -->
                        </div><!-- form-group -->
                    </div><!-- d-flex -->
                    
                </form>
            </div><!-- general-->
            <div id="attriubtes" class="tab-pane">
                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <select class="form-control select2 wd-250">
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
</template>