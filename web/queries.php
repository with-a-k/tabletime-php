<?php

require "connectDb.php";
$db = connectDb();

function getOneTimeEvents() {
  //Gets one-time events;
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

function showAllEvents() {

}

function registerUser() {
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = password_hash(htmlspecialchars($_POST['password']));
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $values = [':username' => $username, ':email' => $email, ':password' => $password]

  $query = 'INSERT INTO tabletime_user (username, email, password) VALUES (:username, :email, :password)'
  try {
    $res = $db->prepare($query);
    $res->execute($values);
  } catch (PDOException $e) {
    echo $e;
    exit();
  }
}

 ?>
