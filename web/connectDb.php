<?php

function connect_db() {
  $db = NULL;

  try {
    $dbUrl = getenv('DATABASE_URL');

    if (!isset($dbUrl) || empty($dbUrl)) {
      $dbUrl = 'LOCAL DATABASE MISSING';
    }

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts['host'];
    $dbPort = $dbOpts['port'];
    $dbUser = $dbOpts['user'];
    $dbPass = $dbOpts['password'];
    $dbName = ltrim($dbOpts['path'],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
  } catch (PDOException $ex) {
    die();
  }

  return $db;
}

 ?>
