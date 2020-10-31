<?php
session_start();
require "connectDb.php";

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
  $db = connect_db();
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

  $query = 'INSERT INTO users (username, email, hash, timezone) VALUES (:username, :email, :password, "America/Denver")';
  try {
    $res = $db->prepare($query);
    $res->bindValue(':username', $username);
    $res->bindValue(':email', $email);
    $res->bindValue(':password', $password);
    $res->execute();
    $newURL = 'index.php';
    $_SESSION['user'] = $db->lastInsertId();
    $_SESSION['username'] = $username;
    header('Location: ' . $newURL);
    die();
  } catch (PDOException $e) {
    echo $e;
    die();
  }
  $badRegister = true;
  $newURL = 'signup.php';
  header('Location: ' . $newURL);
  die();
}
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
      <div class="grid-x">
        <div class="cell">
          <form name="login" action="signup.php" method="POST">
            Username: <input type="text" name="username">
            Email: <input type="text" name="email">
            Password: <input type="password" name="password">
            <input type="submit" class="button" value="Register">
          </form>
          <?php if ($badRegister) {
            echo "Couldn't process your registration. Please try again.";
          } ?>
        </div>
      </div>
    </div>
  </body>
</html>
