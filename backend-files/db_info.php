<?php

  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = null;
  $db_database = 'offers_table';

  $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

  if (mysqli_connect_errno()){
    die("Failed to Connect To DB");
  };



 ?>
