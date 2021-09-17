<?php
header("Cache-Control: no-cache");
header("Content-Type: text/event-stream"); 
include '../../../config.php';  
if($keys){
  
    $stmt = $sql->Execute($sql->Prepare("SELECT * FROM ".$prefix."trades WHERE TRD_STRATEGY_CODE = "
    .$sql->Param('a')."  ORDER BY TRD_CODE DESC LIMIT 20"),array($keys));
    $response = $stmt->GetAll();
} 
// while (true) {
  // Every second, send a "ping" event.

//   echo "event: ping\n"; 
  echo 'data:  '.json_encode($response). '';
  echo "\n\n"; 

  ob_end_flush();
  flush();
//   if ( connection_aborted() ) break;
  sleep(1);
// }

?>