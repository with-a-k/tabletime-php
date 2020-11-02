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
          <div>
            <a href="events?oid<?=$event['id']?>.php"><?=$event['name']?></a>
            Created by <?=$event['creator']?>
            <?=$event['desc']?>
            One-time
          </div>
        </li>
      <?php endforeach; ?>
      <?php foreach ($recs as $event): ?>
        <li>
          <div>
            <a href="events?rid<?=$event['id']?>.php"><?=$event['name']?></a>
            Created by <?=$event['creator']?>
            <?=$event['desc']?>
            Recurring
          </div>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
