<?php
  include "classes/GMAPI.php";
    $botID = -1;
    $token = -1;
    if($_POST["botID"]){
      $botID = $_POST["botID"];
      $token = $_POST["token"];
    }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Havoc HQ</title>
  </head>
  <body>
    <div class="main" style="width: 50%; padding-left: 25%; padding-right: 25%; text-align: center;">
      <h1>Welcome to the Havoc Bot HQ.</h1>
      <p>Please select the user which you would like Havok Bot to run on. (Defaults to Max Murdock)</p>
      <form class="" action="run.php" method="post">
        <p>
          <select name="userInfo" style="width: 100%; height: 25px; border-radius: 5px;">
            <?php
              $GMAPI = new GMAPI();
              $GMID = $GMAPI->getBotData($botID, $token)->group_id;
              for($i = 0; $i<count($GMAPI->getUserData($GMID, $token)); $i++){
                $nickname = $GMAPI->getUserData($GMID, $token)[$i]->nickname;
                $user_id = $GMAPI->getUserData($GMID, $token)[$i]->user_id;
                echo "<option value=\"{$user_id}\">{$nickname}</option>";
              }
            ?>
          </select>
        </p>
        <?php
          echo "<input type=\"hidden\" name=\"botID\" value=\"{$botID}\">";
          echo "<input type=\"hidden\" name=\"token\" value=\"{$token}\">";
        ?>
        <button type="submit" name="run" style="padding: 5px; border-radius: 5px;">Run the Bot</button>
      </form>
    </div>
  </body>
</html>
