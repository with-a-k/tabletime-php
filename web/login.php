<?php session_start(); ?>
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
          <form name="login" action="index.php" method="POST">
            Username: <input type="text" name="user-name">
            Password: <input type="password" name="password">
            <input type="submit" class="button" value="Log In">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
