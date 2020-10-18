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
    <p class="text-center">
      A scheduling app that works across time zones. Feel free to browse events before signing up or logging in.
    </p>
  </body>
</html>
