<?php 
  namespace settings;
    class delete extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){ 
        global $keys;
        $engine = $this->engine; 
        $sql = $this->sql;
        if($this->engine->validatePostForm($this->microtime)){ 
          
          $stmt = $sql->Execute($sql->Prepare("UPDATE ".$this->prefix."seizeemme SET SZD_STATUS='0' WHERE SZD_CODE=".$sql->Param('e')." "),[$this->keys]);
          
          if($stmt == true){
            $this->engine->msg('success','Deleted Successfully');
            $view='list';
          }else{
            $this->engine->msg('error',$sql->errorMsg());
            $view='list';
          }
        }else{
          return false;
        }
      } 
    } 
  ?>

  