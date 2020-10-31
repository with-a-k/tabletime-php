<?php session_start(); ?>
<html>
  <div class="top-bar">
    <div class="top-bar-left">
      <ul class="menu">
        <li><a href="events.php">Browse Events</a></li>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu">
        <?php if(isset($_SESSION["username"])): ?>
          <li><a href="userprofile.php">Your Profile</a></li>
        <?php else: ?>
          <li><a href="login.php">Log In</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</html>
