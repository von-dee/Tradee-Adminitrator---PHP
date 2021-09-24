<div class="content-body">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">    
                        <div class="page-title">
                            <h4>Strategies</h4>
                        </div>
                    </div>

                    <div class="col-xxl-12 col-xl-12">  
                        <div class="row">
                            <?php
                                $i=1;
                                if($paging->total_rows > 0 ){
                                    $page = (empty($page))? 1:$page;
                                    $num = (isset($page))? ($limit*($page-1))+1:1;

                                    foreach ($rs as $val){
                                        // var_dump($val); die();
                            ?>

                            <div class="col-xxl-3 col-xl-6">
                                <div class="card">
                                    
                                    <div class="card-header">
                                        <h4 class="card-title"><?php echo $val['STRG_NAME'];?></h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label">Description</label>
                                                <div class="input-group">
                                                    <p><?php echo $val['STRG_DESCRIPTION'];?>.</p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <p class="mb-0">
                                                    Demo Strategy &nbsp;&nbsp; <br>
                                                    <a href="#"><?php echo $val['STRG_DATEADDED'];?></a></p>
                                                <br>
                                            </div>
                                            
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#stratdetails<?php echo $val['STRG_CODE'];?>">
                                                    Strat Details
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-info btn-block" onclick="push({'view':'tradeview','viewpage':'trades','keys':'<?php echo $val['STRG_CODE'];?>'})" >
                                                    Live Trade
                                                </button>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                

                        

                                <!-- Edit Customer Modal -->
                                <div class="modal fade" id="stratdetails<?php echo $val['STRG_CODE'];?>" >
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Customer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label for="custname">Strategy Name</label>
                                                        <?php echo $val['STRG_CODE'];?>
                                                        <input type="text" class="form-control" name="custname" id="custname<?php echo $val['STRG_CODE'];?>" aria-describedby="helpId" value="<?php echo $val['STRG_NAME'];?>">
                                                        <small id="helpId" class="form-text text-muted">eg. Trading Guy</small>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="custgender">Strategy Status</label>
                                                        <select class="form-control" name="custgender<?php echo $val['STRG_CODE'];?>" id="custgender<?php echo $val['STRG_CODE'];?>">
                                                            <option <?php echo (($val['STRAG_STATUS']=='2'))?'selected':'';?>  value="2">Draft</option>
                                                            <option <?php echo (($val['STRAG_STATUS']=='1'))?'selected':'';?> value="1">Live</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="custgender">Strategy Type</label>
                                                        <select class="form-control" name="custgender<?php echo $val['STRG_CODE'];?>" id="custgender<?php echo $val['STRG_CODE'];?>">
                                                            <option <?php echo (($val['STRG_TYPE']=='male'))?'selected':'';?>  value="male">Male</option>
                                                            <option <?php echo (($val['STRG_TYPE']=='female'))?'selected':'';?> value="female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="custphone">Strategy Description</label>
                                                        <textarea class="form-control" name="custphone<?php echo $val['STRG_CODE'];?>" id="custphone<?php echo $val['STRG_CODE'];?>" cols="30" rows="4"> <?php echo $val['STRG_DESCRIPTION'];?> </textarea>
                                                        <small id="helpId" class="form-text text-muted">eg. 0201234567</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="save<?php echo $val['STRG_CODE'];?>" type="submit" onclick="push({'view':'','viewpage':'update','keys':'<?php echo $val['STRG_CODE'];?>'})" class="btn btn-primary">Update</button>

                                                <button type="button" id="cancel<?php echo $val['STRG_CODE'];?>" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    
                            </div>

                            <?php }}else{?>
                                <div class="col-xxl-3 col-xl-6">
                                    <td colspan="6" align="center"><strong>No Record(s) Found!</strong></td>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
               
            </div>
        </div>