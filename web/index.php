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
    </p>
    <p class="text-center message">
      <?=$_SESSION['message']?>
    </p>
  </body>
  <?php unset($_SESSION['message']); ?>
</html>
