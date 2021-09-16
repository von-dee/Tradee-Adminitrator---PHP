<?php

$action= "wallet\\".(($viewpage)? $viewpage :"lists"); 
$class_init= new $action;
$result= $class_init->Init(); 


$list= new wallet\lists();
// $paging = $list->Init();
// $rs= $paging->paginate();


?>