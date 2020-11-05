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
    WHERE e.id = ". $oid);
  $statement->execute();

  $oneTimeEvent = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $oteId = $row['id'];
    $oteName = $row['name'];
    $oteDesc = $row['description'];
    $oteHost = $row['username'];

    $oneTimeEvent = ['id' => $oteId, 'name' => $oteName, 'desc' => $oteDesc, 'creator' => $oteHost];
  }

  return $oneTimeEvent;
}

function getOneTimeEventBookingsByEvent($oid) {
  $db = connect_db();
  $statement = $db->prepare(
    "SELECT b.id, start_time, duration, u.username
    FROM useronetime AS b
    INNER JOIN tabletime_user as u
    ON b.user_id = u.id
    WHERE b.onetimeevent_id = ". $oid ."
    ORDER BY b.user_id");
  $statement->execute();

  $userAvails = [];

  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $availId = $row['id'];
    $availUsername = $row['username'];
    $availTimeStamp = $row['start_time'];
    $availDuration = $row['duration'];

    $userAvails[] = ['id' => $availId, 'booker' => $availUsername, 'start_time' => $availTimeStamp, 'duration' => $availDuration];
  }

  return $userAvails;
}

function getRecurringEventById($oid) {
  $db = connect_db();
  $statement = $db->prepare(
    "SELECT e.id, e.name, description, u.username
    FROM recurevent AS e
    INNER JOIN tabletime_user as u
    ON e.user_id = u.id
    WHERE e.id = ". $oid);
  $statement->execute();

  $recurringEvent = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $oteId = $row['id'];
    $oteName = $row['name'];
    $oteDesc = $row['description'];
    $oteHost = $row['username'];

    $recurringEvent = ['id' => $oteId, 'name' => $oteName, 'desc' => $oteDesc, 'creator' => $oteHost];
  }

  return $recurringEvent;
}

function getRecurringEventBookingsByEvent($oid) {
  $db = connect_db();
  $statement = $db->prepare(
    "SELECT b.id, day_of_week, hour_of_day, duration, u.username
    FROM userrecur AS b
    INNER JOIN tabletime_user as u
    ON b.user_id = u.id
    WHERE b.recurevent_id = ". $oid ."
    ORDER BY b.user_id");
  $statement->execute();

  $userAvails = [];

  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $availId = $row['id'];
    $availUsername = $row['username'];
    $availDay = $row['day_of_week'];
    $availHour = $row['hour_of_day'];
    $availDuration = $row['duration'];

    $userAvails[] = [
      'id' => $availId,
      'booker' => $availUsername,
      'day_of_week' => $availDay,
      'hour_of_day' => $availHour,
      'duration' => $availDuration
    ];
  }

  return $userAvails;
}

function addBookingToOneTimeEvent() {

}

function addBookingToRecurringEvent() {

}

function createOneTimeEvent() {

}

function createRecurringEvent() {
  
}

 ?>
