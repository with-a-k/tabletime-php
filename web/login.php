<?php
require "connectDb.php";
$db = connect_db();
?>
<html>
  <head>
    <title>TableTime</title>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <h1>TableTime</h1>
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell">
          <form name="login" action="index.php" method="POST">
            Username: <input type="text" name="user-name">
            Password: <input type="password" name="password">
            <button type="button" class="button">Log In</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
