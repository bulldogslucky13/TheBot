<?php
  include "classes/GMAPI.php";
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Havoc HQ</title>
  </head>
  <body>
    <div class="main" style="width: 50%; padding-left: 25%; padding-right: 25%; text-align: center;">
      <h1>Welcome to the Havoc Bot HQ.</h1>
      <p>Please input the BotID you would like the Havok Bot to run on.</p>
      <form action="select.php" method="post">
        <input type="text" name="botID" placeholder="Bot ID">
        <input type="text" name="token" placeholder="Access Token">
        <button type="submit" name="run" style="padding: 5px; border-radius: 5px;">Run the Bot</button>
      </form>
    </div>
  </body>
</html>
