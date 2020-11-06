<?php
session_start();
require "queries.php";
?>
<html>
  <head>
    <title>TableTime</title>
    <link rel=stylesheet href="styles/foundation.css">
    <link rel=stylesheet href="styles/tabletime.css">
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <h1>TableTime</h1>
    <p class="text-center">
      A scheduling app that works across time zones. Feel free to browse events before signing up or logging in.
      <?=$_SESSION['username']?>
    </p>
  </body>
</html>
