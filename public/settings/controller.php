<?php

$action= "settings\\".(($viewpage)? $viewpage :"lists"); 
$class_init= new $action;
$result= $class_init->Init(); 


$list= new settings\lists();
// $paging = $list->Init();
// $rs= $paging->paginate();


?>