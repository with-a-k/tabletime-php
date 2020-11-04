<?php
session_start();
include 'queries.php';
if (isset($_GET['oid'])) {
  //Get the OTE matching the parameter
  $oid = $_GET['oid'];
  $event = getOneTimeEventById($oid);
  $avails = getOneTimeEventBookingsByEvent($oid);
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
    <h1>TableTime</h1>
    <?php print_r($event) ?>
    <?php print_r($avails) ?>
  </body>
</html>
