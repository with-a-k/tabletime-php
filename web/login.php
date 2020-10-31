<?php
session_start();
require "connectDb.php";

if(isset($_POST['username']) && isset($_POST['password'])) {
  $db = connect_db();
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  $query = 'SELECT id, username, hash FROM tabletime_user WHERE username=:username';
  try {
    $res = $db->prepare($query);
    $res->bindValue(':username', $username);
    $res->execute();
    $rsp = $res->fetch(PDO::FETCH_ASSOC);
    if (isset($rsp['username'])) {
      if (password_verify($password, $rsp['hash'])) {
        $_SESSION["user_id"] = $rsp['id'];
        $_SESSION["username"] = $username;
        $newURL = 'index.php';
        header('Location: ' . $newURL);
        die();
      }
    }
    $badLogin = true;
    $newURL = "login.php";
    header('Location: ' . $newURL);
    die();
  } catch (PDOException $e) {
    echo $e;
    die();
  }
  $badLogin = true;
  $newURL = 'login.php';
  header('Location: ' . $newURL);
  die();
}
?><html>
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
          <form name="login" action="index.php" method="POST">
            Username: <input type="text" name="user-name">
            Password: <input type="password" name="password">
            <input type="submit" class="button" value="Log In">
          </form>
          <?php if ($badLogin) {
            echo "Username or password were incorrect";
          } ?>
        </div>
      </div>
    </div>
  </body>
</html>
