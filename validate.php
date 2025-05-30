<?php
  session_start();

  require_once('user.php');

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  $_SESSION['username'] = $username;
  // check username and password
  $user = new User();

  if ($user->validate_user($username, $password)) {
    $_SESSION['authenticated'] = 1;
    header('location: /');
    echo "successful login";
  } else {
      if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = 1;
      } else {
        $_SESSION['failed_attempts'] = $_SESSION['failed_attempts'] + 1;
      }
    echo "This is unsuccessful attempt number " . $_SESSION['failed_attempts'];

    echo "<form action='/login.php'>
    <input type='submit' value='Try again' />
</form>";
  }

?>  