<?php

$prefix  = WEB_DB_PREFIX;
include("controller.php");
    switch($view){
		case "add":
		   include "views/add.php";
        break;
        case "stacks":
            include "views/stacks.php";
        break;
        case "tradeview":
            include "views/tradeview.php";
        break;
        default:
            include "views/list.php";
        break;
    }
    include("scripts/js.php");
?>