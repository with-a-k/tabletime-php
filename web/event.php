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
  $rid = $_GET['rid'];
  $event = getRecurringEventById($rid);
  $avails = getRecurringEventBookingsByEvent($rid);
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
      <?php if(isset($GET['oid'])): ?>
        <h4>One-Time Event</h4>
      <?php elseif(isset($GET['rid'])): ?>
        <h4>Recurring Event</h4>
      <?php else: ?>
        <h4>Event Not Found</h4>
      <?php endif; ?>
      <h4>Host: <?= $event['creator']?></h4>
      <p><?= $event['desc']?></p>
    </div>
    <div class="bookings-holder">
      <h3>Potential Attendees:</h3>
      <ul class="attendees">
        <?php foreach($avails as $avail): ?>
          <li id="booking-<?=$avail['id']?>">
            <h5><?=$avail['booker']?></h5>
            <?php if(isset($GET['oid'])): ?>
              <p>Available at <?=$avail['start_time']?> for <?=$avail['duration']?></p>
            <?php elseif(isset($GET['rid'])): ?>
              <p>Available on <?=$avail['day_of_week']?>s at <?=$avail['hour_of_day']?> for <?=$avail['duration']?></p>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
