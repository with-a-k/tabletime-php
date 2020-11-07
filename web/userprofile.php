<?php
session_start();
require "queries.php";

if(!isset($_SESSION['username'])) {
  $newURL = 'index.php';
  $_SESSION['message'] = "Not available, as you are not logged in.";
  header('Location: ' . $newURL);
  die();
} else {
  $events = getEventsByUser($_SESSION['user_id']);
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
    <ul class="text-center">
      <li>Your Name: <?=$_SESSION['username']?></li>
    </ul>
    <div class="grid-container">
      <ul>
      <?php foreach ($events as $event): ?>
        <li>
          <div class="event-item">
            <?php if($event['type'] == "One-time"): ?>
              <a href="event.php?oid=<?=$event['id']?>"><?=$event['name']?></a><br>
            <?php elseif($event['type'] == "Recurring"): ?>
              <a href="event.php?rid=<?=$event['id']?>"><?=$event['name']?></a><br>
            <?php endif; ?>
            Created by <?=$event['creator']?><br>
            <?=$event['desc']?>
            <b><?=$event['type']?></b>
          </div>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
