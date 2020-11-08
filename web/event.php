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
    <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
    <script src="scripts/tabletime-scripts.js"></script>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <h1>TableTime</h1>
    <div class="event-detail">
      <h3><?= $event['name']?></h3>
      <?php if(isset($_GET['oid'])): ?>
        <h4>One-Time Event</h4>
      <?php elseif(isset($_GET['rid'])): ?>
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
          <li class="booking">
            <h5><?=$avail['booker']?></h5>
            <?php if(isset($_GET['oid'])): ?>
              <p>Available at <?=$avail['start_time']?> for <?=$avail['duration']?></p>
            <?php elseif(isset($_GET['rid'])): ?>
              <p>Available on <?=$avail['day_of_week']?> at <?=$avail['hour_of_day']?> for <?=$avail['duration']?></p>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php if(isset($_SESSION['username']) && isset($_SESSION['user_id'])): ?>
      <div class="add-avail-form">
        <h5>When are you available for this event?</h5>
        <?php if(isset($_GET['oid'])): ?>
            <label for="date">Date:</label> <input type="date" name="date" id="booking-form-date">
            <label for="time">Time:</label> <input type="time" name="time" id="booking-form-time">
          <?php elseif(isset($_GET['rid'])): ?>
            <label for="day_of_week">Day:</label> <select name="day_of_week" id="day_of_week">
            <option value="Mondays">Mondays</option>
            <option value="Tuesdays">Tuesdays</option>
            <option value="Wednesdays">Wednesdays</option>
            <option value="Thursdays">Thursdays</option>
            <option value="Fridays">Fridays</option>
            <option value="Saturdays">Saturdays</option>
            <option value="Sundays">Sundays</option>
          </select>
          <label for="hour_of_day">Hour:</label> <input type="text" name="hour_of_day" id="hour_of_day">
        <?php endif ?>
        <label for="duration">Duration:</label> <input type="text" name="duration" id="booking-form-duration">
        <button class="button" onclick="bookAvailability(<?=$_SESSION['user_id']?>, <?php echo isset($_GET['oid']) ? $_GET['oid'] : $_GET['rid']?>, <?$_SESSION['username']?>)" id="ajax-submit-booking">Submit</button>
      </div>
    <?php endif; ?>
  </body>
</html>
