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
  }

  public function create_user ($username, $password) {
    $db = db_connect();
    $statement = $db->prepare("INSERST into users ...");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);  
    return $rows;
  }


?>