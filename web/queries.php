<?php
session_start();

include "connectDb.php";

function getOneTimeEvents() {
  //Gets one-time events;
  $db = connect_db();
  $statement = $db->prepare(
    "SELECT e.id, e.name, description, u.username
    FROM onetimeevent AS e
    INNER JOIN tabletime_user as u
    ON e.user_id = u.id");
  $statement->execute();

  $oneTimeEvents = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $oteId = $row['id'];
    $oteName = $row['name'];
    $oteDesc = $row['desc'];
    $oteHost = $row['username'];

    $oneTimeEvents[] = ['id' => $oteId, 'name' => $oteName, 'desc' => $oteDesc, 'creator' => $oteHost];
  }

  return $oneTimeEvents;
}

function getRecurringEvents() {
  //Gets recurring events;
  $db = connect_db();
  $statement = $db->prepare(
    "SELECT e.id, e.name, description, u.username
    FROM recurevent AS e
    INNER JOIN tabletime_user as u
    ON e.user_id = u.id");
  $statement->execute();

  $recurringEvents = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $recId = $row['id'];
    $recName = $row['name'];
    $recDesc = $row['desc'];
    $recHost = $row['username'];

    $recurringEvents[] = ['id' => $recId, 'name' => $recName, 'desc' => $recDesc, 'creator' => $recHost];
  }

  return $recurringEvents;
}

function getOneTimeEventById($oid) {
  $db = connect_db();
  $statement = $db->prepare(
    "SELECT e.id, e.name, description, u.username
    FROM onetimeevent AS e
    INNER JOIN tabletime_user as u
    ON e.user_id = u.id
    WHERE e.id = $oid");
  $statement->execute();

  $oneTimeEvents = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $oteId = $row['id'];
    $oteName = $row['name'];
    $oteDesc = $row['desc'];
    $oteHost = $row['username'];

    $oneTimeEvent[] = ['id' => $oteId, 'name' => $oteName, 'desc' => $oteDesc, 'creator' => $oteHost];
  }

  return $oneTimeEvent;
}


 ?>
