<?php
session_start();
require "connectDb.php";

if(!isset($_SESSION['username'])) {
  $newURL = 'index.php';
  $_SESSION['message'] = "Not available, as you are not logged in.";
  header('Location: ' . $newURL);
  die();
}

if(isset($_POST['event-name']) && isset($_POST['desc']) && isset($_POST['min-users']) && isset($_POST['event-type'])) {
  $db = connect_db();
  $eventName = htmlspecialchars($_POST['event-name']);
  $desc = htmlspecialchars($_POST['desc']);
  $minUsers = htmlspecialchars($_POST['min-users']);
  $eventType = htmlspecialchars($_POST['event-type']);

  if ($eventType == "one-time") {
    $query = 'INSERT INTO onetimeevent (name, description, required_users, minimum_users, user_id)
    VALUES (:name, :description, :req_users, :min_users, :user_id)';
    try {
      $res = $db->prepare($query);
      $res->bindValue(':name', $eventName);
      $res->bindValue(':description', $desc);
      $res->bindValue(':req_users', "");
      $res->bindValue(':min_users', $minUsers);
      $res->bindValue(':user_id', $_SESSION['user_id']);
      $res->execute();
      $newEventId = $db->lastInsertId();
      $newURL = 'event.php?oid='.$newEventId;
      header('Location: ' . $newURL);
      die();
    } catch (PDOException $e) {
      echo $e;
      die();
    }
  } else if ($eventType == "recurring") {
    $query = 'INSERT INTO recurevent (name, description, required_users, minimum_users, user_id)
    VALUES (:name, :description, :req_users, :min_users, :user_id)';
    try {
      $res = $db->prepare($query);
      $res->bindValue(':name', $eventName);
      $res->bindValue(':description', $desc);
      $res->bindValue(':req_users', "");
      $res->bindValue(':min_users', $minUsers);
      $res->bindValue(':user_id', $_SESSION['user_id']);
      $res->execute();
      $newEventId = $db->lastInsertId();
      if (isset($newEventId)) {
        $newURL = 'event.php?rid='.$newEventId;
        header('Location: ' . $newURL);
        die();
      }
      $badEvent = true;
      $newURL = 'newEvent.php';
      header('Location: ' . $newURL);
      die();
    } catch (PDOException $e) {
      echo $e;
      die();
    }
  } else {
    $badEvent = true;
    $newURL = 'newEvent.php';
    header('Location: ' . $newURL);
    die();
  }

  $badEvent = true;
  $newURL = 'newEvent.php';
  header('Location: ' . $newURL);
  die();
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
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell">
          <form name="new-event" action="newEvent.php" method="POST">
            <label for="event-name">Event Name:</label> <input type="text" name="event-name">
            <label for="description">Description:</label> <input type="text" name="desc">
            <label for="minimum-users">Minimum Users:</label> <input type="number" name="min-users">
            <input type="radio" id="one-time" name="event-type" value="one-time">
            <label for="one-time">One-Time Event</label>
            <input type="radio" id="recurring" name="event-type" value="recurring">
            <label for="recurring">Recurring Event</label>
            <input type="submit" class="button" value="Register">
          </form>
          <?php if ($badEvent) {
            echo "Couldn't process your event. Please try again.";
          } ?>
        </div>
      </div>
    </div>
  </body>
</html>
