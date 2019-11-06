<?php
class GMAPI {
  function getBotData($id, $token){
    $url = "https://api.groupme.com/v3/bots?token=".$token;

    //Use file_get_contents to GET the URL in question.
    $contents = file_get_contents($url);
    //This variable holds all data on user. Popular pulls: $userObjects->user_id, $userObjects->name

    //If $contents is not a boolean FALSE value.
    if($contents !== false){
        //Print out the contents.
        $contents = json_decode($contents);
        $userObjects = $contents->response;
        for($i = 0; $i<count($userObjects); $i++){
          if($userObjects[$i]->bot_id == $id){
            return $userObjects[$i];
          }
        }
    } else {
      die("This failed. Run it back turbo");
    }
  }

  function getUserData($gid, $token){
    $url = "https://api.groupme.com/v3/groups/{$gid}?token=$token";

    //Use file_get_contents to GET the URL in question.
    $contents = file_get_contents($url);
    //This variable holds all data on user. Popular pulls: $userObjects->user_id, $userObjects->name

    //If $contents is not a boolean FALSE value.
    if($contents !== false){
        //Print out the contents.
        $contents = json_decode($contents);
        $userObjects = $contents->response->members;
        return $userObjects;
      } else {
        die("This failed. Run it back turbo");
      }
  }

  function runCURL($url, $command){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $command);
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
  }
}
