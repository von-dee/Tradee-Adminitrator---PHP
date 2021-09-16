<?php

$action= "strategies\\".(($viewpage)? $viewpage :"lists"); 
$class_init= new $action;
$result= $class_init->Init(); 


$list= new strategies\lists();
$paging = $list->Init();
$rs= $paging->paginate();


?>