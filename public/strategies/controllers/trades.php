<?php 
  namespace strategies;
    class trades extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        $sql = $this->sql;
        $engine = $this->engine;
        if($this->keys){
          
            $stmt = $sql->Execute($sql->Prepare("SELECT * FROM ".$this->prefix."trades WHERE TRD_STRATEGY_CODE = ".$sql->Param('a')."  ORDER BY TRD_CODE DESC LIMIT 20"),array($this->keys));
            $response = $stmt->GetAll();
         
        }else{
          $this->engine->msg('info','Error fetching this page...try again');
          $response = [];
        }
        return $response;
      }
    } 
  ?>

  