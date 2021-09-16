<?php 
  namespace strategies;
    class update extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        global $view;
        $sql = $this->sql;
        $keys = $this->keys;
        if($this->engine->validatePostForm($this->microtime)){  
          if(!empty($keys)){


            $stmt = $sql->Execute($sql->Prepare("UPDATE {$this->prefix}seizeemme SET 
            SZD_TYPE=".$sql->Param('a').",
            SZD_STATUS=".$sql->Param('c')." 
            WHERE SZD_CODE=".$sql->Param('f')." "),array($this->rvkdtype, $this->rvkdstatus, $keys));

            if($stmt == true){
              $this->engine->msg('success','Updated successfully');
              $view ='';
            }else{
              $this->engine->msg('error',$sql->errorMsg());
              $view ='page';
            }

        }else{
          $this->engine->msg('info','Please fill all required fields and try again');
          $view ='page';
        }
      }
    }
  } ?>