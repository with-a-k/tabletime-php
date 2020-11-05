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
    <link rel=stylesheet href="styles/tabletime.css">
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <h1>TableTime</h1>
    <div class="event-detail">
      <h3><?= $event['name']?></h3>
      <h4>Host: <?= $event['creator']?></h4>
      <p><?= $event['desc']?></p>
    </div>
    <div class="bookings-holder">
      <h3>Potential Attendees:</h3>
      <ul class="attendees">
        <?php foreach($avails as $avail): ?>
          <li id="booking-<?=$avail['id']?>">
            <h5><?=$avail['booker']?></h5>
            <p>Available at <?=$avail['start_time']?> for <?=$avail['duration']?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
