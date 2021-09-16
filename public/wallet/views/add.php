<div class="page-products">
    <div class="card" shadow>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-filled" padding>
                        <div class="panel-title top">
                            <h5><?php echo ((isset($keys) && $keys!='undefined'))? '<span>Edit Product</span>':'<span>Register Earth Equipment</span>';?></h5>
                            <div class="panel-right">
                                <?php if(isset($keys) && $keys!='undefined'){?>
                                    <button type="button" class="btn btn-success" onclick="push({'view':'','viewpage':'update','keys':'<?php echo $keys;?>'})"><i class="la la-check"></i> Update</button>
                                <?php }else{ ?>
                                    <button type="button" class="btn btn-success" onclick="push({'view':'','viewpage':'add'})"><i class="la la-check"></i> Save</button>
                                <?php }?>
                                    
                                <button type="button" class="btn btn-danger" onclick="push({'view':'','viewpage':''})"><i class="la la-close"></i> Cancel</button>
                            </div>
                        </div>
                        <div class="panel-body" margin-top>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rvkdequipmentname">Earth Equipment</label>
                                        <select class="form-control" name="rvkdequipmentname" id="rvkdequipmentname">
                                            <option selected disabled>select earth equipment</>
                                            <?php 
                                                $compcat = $engine->getEquipmentList();
                                                foreach($compcat as $compcat){
                                                    $arr = array($compcat['MACH_CODE'],$compcat['MACH_NAME']);
                                                    $arr_string = implode(", ",$arr);
                                            ?>
                                            <option <?php echo is_object($result) ? '' : ($result['REG_EQUIPMENT_CODE'] == $compcat['MACH_CODE'] ? 'selected':'');?> value="<?php echo $arr_string;?>"><?php echo $compcat['MACH_NAME'];?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="rvkdcompname">Company</label>
                                      <select class="form-control" name="rvkdcompname" id="rvkdcompname">
                                        <option selected disabled>Select Company</>
                                        <?php 
                                             $compcat = $engine->getCompanyList();
                                             foreach($compcat as $compcat){
                                                 $arr = array($compcat['ASGS_CODE'],$compcat['ASGS_NAME']);
                                                $arr_string = implode(", ",$arr);
                                        ?>
                                        <option <?php echo is_object($result) ? '' : ($result['REG_COMPANY_CODE'] == $compcat['ASGS_CODE'] ? 'selected':'');?> value="<?php echo $arr_string;?>"><?php echo $compcat['ASGS_NAME'];?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                      <label for="rvkdstatus">Status</label>
                                      <select class="form-control" name="rvkdstatus" id="rvkdstatus">
                                        <!-- <option <?php //echo is_object($result) ? '' : ($result['TKPY_STATUS']=='1' ? 'selected':'');?> value="1">Draft</option> -->
                                        <option <?php echo is_object($result) ? '' : ($result['RVK_STATUS']=='2' ? 'selected':'');?> value="2">Publish</option>
                                      </select>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                    <label for="rvkddateoforder">Date of Court Order</label>
                                        <input type="text" class="form-control datepicker" name="rvkddateoforder" id="rvkddateoforder" aria-describedby="helpId" value="<?php echo (is_object($result)) ? '' : date('d-m-Y',strtotime($result['RVK_DATEREVOKED']));?>" placeholder="">
                                    </div>
                                </div>

                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                      <label for="rvkdtype">Type</label>
                                      <select class="form-control" name="rvkdtype" id="rvkdtype">
                                        <option <?php echo is_object($result) ? '' : ($result['RVK_TYPE']=='' ?   'selected':'');?> value="">Select Type</option>
                                        <option <?php echo is_object($result) ? '' : ($result['RVK_TYPE']=='Seized' ? 'selected':'');?> value="Seized">Seized</option>
                                        <option <?php echo is_object($result) ? '' : ($result['RVK_TYPE']=='Returned' ? 'selected':'');?> value="Returned">Returned</option>
                                    
                                      </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                    <label for="rvkdordercode">Court Order Code</label>
                                        <input type="number" class="form-control" name="rvkdordercode" id="rvkdordercode" aria-describedby="helpId" value="<?php echo (is_object($result)) ? '' : $result['RVK_ORDERCODE'];?>" placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="rvkdimage">Court Order Images</label>
                                        <input type="file" class="form-control" name="rvkdimage[]" id="rvkdimage" aria-describedby="helpId"  placeholder="" multiple>
                                        <input type="hidden" name="oldphoto" id="oldphoto" value='<?php echo is_object($result) ? '': ($result['TKPY_IMAGES']) ;?>'>
                                        <small id="helpId" class="form-text text-muted">note: first image will be used as main product image.</small>
                                    </div>
                                </div>

                                <div class="col-sm-4 imagelist" id="imagelist">
                                    <!-- List of images -->
                                    <?php 
                                        if(isset($keys) && $keys!='undefined'){ 
                                            $images = $result['RVK_IMAGES'] ?? [""];
                                        }
                                    ?>
                                </div>
                    

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="rvkddiscription">Discription</label>
                                        <textarea class="form-control" name="rvkddiscription" id="rvkddiscription" cols="30" rows="10"><?php echo (is_object($result))? '' : $result['SZD_DESCRIPTION'];?></textarea>
                                    </div>
                                </div>

                               
                                <script>
                                    var images = <?php if ($images){print_r($images);}else{echo '[]';}?>;
                                    console.log(images);
                                    images.forEach (function (e) {
                                        $("<span class=\"pip\">" +
                                            "<img class=\"imageThumb\" src=\"<?php echo WEB_PRODUCTS; ?>" + e + "\" title=\"" + e + "\"/>" +
                                            "<br/><span class=\"remove\"><img class=\"delete-btn\" id=\"remove\" src=\"theme/assets/img/x.png\" alt=\"close\"></span>" +
                                            "</span>").appendTo("#imagelist");
                                        $(".remove").click(function(){
                                            $(this).parent(".pip").remove();
                                        images.pop(e);
                                        var oldphoto = JSON.stringify(images);
                                        $('#oldphoto').val(oldphoto);
                                        }); 
                                    });
                                    
                                    $(document).ready(function() {
                                        if (window.File && window.FileList && window.FileReader) {
                                            $("#prodimage").on("change", function(e) {
                                                var files = e.target.files,
                                                    filesLength = files.length;
                                                for (var i = 0; i < filesLength; i++) {
                                                    var f = files[i]
                                                    var fileReader = new FileReader();
                                                    fileReader.onload = (function(e) {
                                                        var file = e.target;
                                                        $("<span class=\"pip\">" +
                                                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                                            "<br/><span class=\"remove\"><img class=\"delete-btn\" id=\"remove\" src=\"theme/assets/img/x.png\" alt=\"close\"></span>" +
                                                            "</span>").appendTo("#imagelist");
                                                        $(".remove").click(function(){
                                                            $(this).parent(".pip").remove();
                                                        }); 
                                                    });
                                                    fileReader.readAsDataURL(f);

                                                }
                                            });
                                            
                                        } else {
                                            alert("Your browser doesn't support to File API")
                                        }
                                        
                                        $(".remove").click(function(){
                                            $(this).parent(".pip").remove();
                                        }); 
                                    });
                                </script>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>