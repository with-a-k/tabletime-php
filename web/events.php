<?php
session_start();
include 'queries.php';
$otes = getOneTimeEvents();
$recs = getRecurringEvents();
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
      <ul>
      <?php foreach ($otes as $event): ?>
        <li>
          <div class="event-item">
            <a href="events?oid=<?=$event['id']?>.php"><?=$event['name']?></a><br>
            Created by <?=$event['creator']?><br>
            <?=$event['desc']?>
            <b>One-time</b>
          </div>
        </li>
      <?php endforeach; ?>
      <?php foreach ($recs as $event): ?>
        <li>
          <div class="event-item">
            <a href="events?rid=<?=$event['id']?>.php"><?=$event['name']?></a><br>
            Created by <?=$event['creator']?><br>
            <?=$event['desc']?>
            <b>Recurring</b>
          </div>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
