<?php
header("Cache-Control: no-cache");
header("Content-Type: text/event-stream"); 
include '../../../config.php';  
if($keys){
  
    $stmt = $sql->Execute($sql->Prepare("SELECT * FROM ".$prefix."trades WHERE TRD_STRATEGY_CODE = "
    .$sql->Param('a')."  ORDER BY TRD_CODE DESC LIMIT 20"),array($keys));
    $response = $stmt->GetAll();


    $stmt = $sql->Execute($sql->Prepare("SELECT * FROM ".$prefix."activities WHERE ACT_STRAT_CODE = "
    .$sql->Param('a')."  ORDER BY ACT_CODE DESC LIMIT 20"),array($keys));
    $activities = $stmt->GetAll();
} 
// while (true) {
  // Every second, send a "ping" event.

//   echo "event: ping\n"; 

  $result['response'] = $response;
  $result['activities'] = $activities;

  echo 'data:  '.json_encode($result). '';
  echo "\n\n"; 

  ob_end_flush();
  flush();
//   if ( connection_aborted() ) break;
  sleep(1);
// }

?>