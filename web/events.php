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
        <li><a href="events/<?=$event['id']?>.php">Link to event page</a></li>
      <?php endforeach; ?>
      </ul>
      <?php print_r($recs); ?>
    </div>
  </body>
</html>
