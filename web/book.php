<?php
require "queries.php";
$eventType = htmlspecialchars($_POST['event_type']);
$userId = htmlspecialchars($_POST['user_id']);
$duration = htmlspecialchars($_POST['duration']);
if ($eventType == 'recurring') {
  $rid = htmlspecialchars($_POST['event_id']);
  $dayOfWeek = htmlspecialchars($_POST['day_of_week']);
  $hourOfDay = htmlspecialchars($_POST['hour_of_day']);
  addBookingToRecurringEvent($userId, $rid, $dayOfWeek, $hourOfDay, $duration);
} elseif ($eventType == 'one-time') {
  $oid = htmlspecialchars($_POST['event_id']);
  $dateTime = htmlspecialchars($_POST['date_time']);
  addBookingToOneTimeEvent($userId, $oid, $dateTime, $duration);
} else {
  die();
}
?>
