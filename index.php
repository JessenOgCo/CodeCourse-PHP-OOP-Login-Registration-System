<?php
// Include Core Initialization File
require_once 'core/init.php';

if(Session::exists('home')) {
  echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()) {
?>
  <p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>

  <ul>
    <li><a href="update.php">Update Details</a></li>
    <li><a href="changepassword.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
<?php

  if($user->hasPermission('moderator')) {
    echo '<p>You are a Moderator!</p>';
  } else {
    echo '<p>You are a standard user.</p>';
  }

} else {
  echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register</a></p>';
}
