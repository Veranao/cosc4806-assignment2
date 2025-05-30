<?php
session_start();
require_once('user.php');

$user = new User();
$user_list = $user->get_all_users();

date_default_timezone_set('America/New_York');
$currentDate = date('l, F, j, Y');
$currentTime = date('h:i A');

if (!isset($_SESSION['authenticated'])) {
  $_SESSION['authenticated'] = 0;
}

//Check if user is authenticated and if not, route to login.php
if ($_SESSION['authenticated'] != 1) {
  header('location: /login.php');
} else {
  echo "Welcome, " . $_SESSION['username'] . ". You successfully logged in on " . $currentDate . " at " . $currentTime . ".";
}

// echo "<pre>";
// print_r($user_list);
?>


<!DOCTYPE html>

<html>
  <head>
    <title> Index </title>
  </head>

  <body>
    <?php echo '<h2>Welcome to the Landing Page of Assignment 2</h2>'; ?> 
    <?php echo '<p> Click on the button to get to the login page and get started. </p>'; ?>


    <a href="<?php 
        if ($_SESSION['authenticated'] == 1) {
          echo 'index.php';
        } else {
          echo 'login.php';
        }
      ?>">
      <button id="go" name="go" type="button"> Go To Login Page </button>
    </a>

    <a href="signup.php">
      <button id="go" name="go" type="button"> Create a new account</button>
    </a>

  <br>
  <br>

  <footer>
    <a href="/logout.php"> 
      <button type="button" id="logout" name="logout"> Logout Here </button>
    </a>
  </footer>
</html>
