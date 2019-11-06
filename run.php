<?php
error_reporting(E_ALL);
include "classes/GMAPI.php";
$botID = "430e9d49ab7c70b6dc02efc9e0";
$token = -1;
if($_POST["botID"]){
  //var_dump($_POST["botID"]);
  $botID = $_POST["botID"];
  $token = $_POST["token"];
}
$GMAPI = new GMAPI();
$name = "Max Murdock";
$userID = 30623716;
echo "here";
$GMID = $GMAPI->getBotData($botID, $token)->group_id;
if($_POST["userInfo"]){
  $userID = $_POST["userInfo"];
  $userData = $GMAPI->getUserData($GMID, $token);
  for($i = 0; $i<count($userData); $i++){
    if($userData[$i]->user_id == $userID){
      $name = $userData[$i]->nickname;
    }
  }
}
echo "here";
$nameLength = strlen($name)+1;
for ($i = 0; $i<50; $i++){
  $command = "{ \"attachments\": [{\"loci\": [[0, {$nameLength}]],\"type\": \"mentions\",\"user_ids\": [\"{$userID}\"]}], \"text\" : \"@{$name}\", \"bot_id\" : \"{$botID}\"}";
  $url = "https://api.groupme.com/v3/bots/post";
  $GMAPI->runCURL($url, $command);
  //echo $command."<br>";
}

echo "It has been run. Thank you for using Havoc Bot. <a href='index.php'>Back</a>";
?>
