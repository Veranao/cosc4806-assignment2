<?php
  session_start();

  require_once('user.php');

  $message = "";
  $valid = true;
  if(isset($_POST['SubmitButton'])){
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    $validate_password = $_POST['validate_password']; 

    // check if username already exists
    $user = new User();
    if($user -> checkUserExists($username)) {
      $message = "Username already exists";
      $valid = false;
    }
    else if($password != $validate_password) {
      $message = "Passwords do not match";
      $valid = false;
    } else if (strlen($password) < 8) {
      $message = "Password must be at least 8 characters long";
      $valid = false;
    } else if (!preg_match('/[A-Z]/', $password)) {
      $message = "Password must contain at least one uppercase letter";
      $valid = false;
    } else {
      $user -> create_user($username, $password);
      header("Location: /login.php"); 
      exit;
    }

  }
?>

<!DOCTYPE html>

<html>
  <head>
    <title> Sign up </title>
  </head>

  <body>
    <h1> Welcome to the Sign Up Page for Assignment 2 !</h1>

    <form action="" method="post">
      <label> Username: </label>
      <input type="text" id="username" name="username" placeholder="Username..."> </input>

      <br>

      <label> Password :</label>
      <input type="password" id="password" name="password" placeholder="Password..."> </input>

      <br>

      <label> Validate Password :</label>
      <input type="password" id="validate_password" name="validate_password" placeholder="Re-enter pasword..."> </input>

      <br>

      <input type="submit" value="Create Account" name="SubmitButton"/>

      <a href="index.php">
        <button id="go" name="go" type="button">Cancel</button>
      </a>
      <br>
      <?php echo $message; ?>
    </form>
  </body>
</html>