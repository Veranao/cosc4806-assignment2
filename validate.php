<?php
  session_start();

  $valid_username = "Victor";
  $valid_password = "php123";

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  $_SESSION['username'] = $username;

  if ($valid_username == $username && $valid_password == $password) {
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
  }

?>