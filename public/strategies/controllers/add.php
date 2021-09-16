<?php 
  namespace strategies;
    class add extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        $sql = $this->sql;
        $actor = array('id'=>$this->userid,'name'=>$this->fullname);
        $writtenby = json_encode($actor);
        $inputted_date = date('Y-m-d H:i:s');
        
        if($this->engine->validatePostForm($this->microtime)){  
          if(!empty($this->rvkdcompname)){
            
            $gencode = $this->engine->generateCode($this->prefix.'emmeregistration','REG','REG_CODE');
            $gencode_re = $this->engine->generateCode($this->prefix.'emmereregistration','REG','REG_CODE');

            
            $rvkdcompname = explode(", ",$this->rvkdcompname);
            $rvkdcomp_code = $rvkdcompname[0];
            $rvkdcomp_name = $rvkdcompname[1];

            $rvkdequipmentname = explode(", ",$this->rvkdequipmentname);
            $rvkdequipment_code = $rvkdequipmentname[0];
            $rvkdequipment_name = $rvkdequipmentname[1];

            
            $stmt = $sql->Execute($sql->Prepare("INSERT INTO {$this->prefix}emmeregistration (REG_CODE,
            REG_EQUIPMENT_NAME, REG_EQUIPMENT_CODE, REG_COMPANY_NAME, REG_COMPANY_CODE, REG_DATEREG,
            REG_TYPE, REG_ORDERCODE, REG_IMAGES, REG_DESCRIPTION, REG_STATUS, REG_DATEUPDATED, REG_ADDEDBY) 
            
            VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('f').",".$sql->Param('c').",".$sql->Param('d').")"),
            
            array($gencode,  $rvkdequipment_code, $rvkdequipment_name, $rvkdcomp_name, $rvkdcomp_code,  $this->rvkddateoforder, $this->rvkdtype, $this->rvkdordercode, $this->rvkdimage, $this->rvkddiscription, $this->rvkdstatus, $inputted_date, $writtenby));


            $stmt_re = $sql->Execute($sql->Prepare("INSERT INTO {$this->prefix}emmeregistration (REG_CODE,
            REG_EQUIPMENT_NAME, REG_EQUIPMENT_CODE, REG_COMPANY_NAME, REG_COMPANY_CODE, REG_DATEREG,
            REG_TYPE, REG_ORDERCODE, REG_IMAGES, REG_DESCRIPTION, REG_STATUS, REG_DATEUPDATED, REG_ADDEDBY) 
            
            VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('f').",".$sql->Param('c').",".$sql->Param('d').")"),
            
            array($gencode_re,  $rvkdequipment_code, $rvkdequipment_name, $rvkdcomp_name, $rvkdcomp_code,  $this->rvkddateoforder, $this->rvkdtype, $this->rvkdordercode, $this->rvkdimage, $this->rvkddiscription, $this->rvkdstatus, $inputted_date, $writtenby));


            if($stmt == true && $stmt_re == true){
              $this->engine->msg('success','Saved successfully.');
            }else{
              $this->engine->msg('error',$sql->errorMsg());
            }
            
          }else{
            $this->engine->msg('info','Please fill all required fields and try again');
          }
        }
      }
  } ?>