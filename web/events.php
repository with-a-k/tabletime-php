<?php
session_start();
include 'queries.php';
$otes = getOneTimeEvents();
?>
<html>
  <head>
    <title>TableTime</title>
    <link rel=stylesheet href="styles/foundation.css">
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <h1>TableTime</h1>
    <div class="grid-container">
      <?php print_r($otes); ?>
    </div>
  </body>
</html>
