<?php
session_start();
?>
<html>
  <div class="top-bar">
    <div class="top-bar-left">
      <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="events.php">Browse Events</a></li>
        <?php if(isset($_SESSION['username'])): ?>
          <li><a href="newEvent.php">Create Event</a></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu">
        <li><p class="debug-alert"><?=$_SESSION['debug']?></p></li>
        <?php if(isset($_SESSION['username'])): ?>
          <li><a href="userprofile.php">Your Profile</a></li>
          <li><a href="logout.php">Log Out</a></li>
        <?php else: ?>
          <li><a href="login.php">Log In</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</html>
