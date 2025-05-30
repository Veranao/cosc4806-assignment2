<?php

  require_once('database.php');

  Class User {
    public function get_all_users () {
      $dbh = db_connect();
      $statement = $dbh->prepare("select * from users");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function get_user ($username) {
      $dbh = db_connect();
      $statement = $dbh->prepare("select * from users where username = '$username'");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return reset($rows);
    }


    public function create_user ($username, $password) {
      $db = db_connect();
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $statement = $db->prepare("INSERT into users (username, password) values ('$username', '$hash')");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);  
      return $rows;
    }

    public function validate_user ($username, $password) {
      $user = $this->get_user($username);
      $hash = $user['password'];
      return password_verify($password, $hash);
    }
  }


?>