<?php
session_start();
include 'queries.php';
if (isset($_GET['oid'])) {
  //Get the OTE matching the parameter
  //$event = ;
} else if (isset($_GET['rid'])) {
  //Get the RcE matching the parameter
  //$event = ;
}
?>
<html>
  <head>
    <title>TableTime</title>
    <link rel=stylesheet href="styles/foundation.css">
  </head>
  <body>
    <?php include 'navbar.php'; ?>
  </body>
</html>
