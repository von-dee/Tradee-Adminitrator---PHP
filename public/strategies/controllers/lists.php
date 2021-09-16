<?php 
  namespace strategies;
    class lists extends \setup { 
      public $fdsearch;
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        
        $userid = $this->session->get('actorid');


        if(!empty($this->fdsearch)){
          $query = "SELECT * FROM ".$this->prefix."strategies WHERE STRG_NAME LIKE ".$this->sql->Param('a')." AND STRAG_STATUS !='0' ";
          $input = [$this->fdsearch.'%'];
        }else {
            $query = "SELECT * FROM ".$this->prefix."strategies WHERE STRAG_STATUS !='0' ORDER BY STRG_DATEADDED DESC";
            $input = [];
        }

        if(!isset($this->limit)){
            $this->limit = $this->session->get("limited");
        }else if(empty($this->limit)){
            $this->limit = 20;
        }

        global $fdsearch;
        $this->session->set("limited",$this->limit);
        $length = 10; 
        $paging = new \Pagination($this->sql,$query,$this->limit,$length,$input);
        return $paging;

      
        
      }

     
  } ?>