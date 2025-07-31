<?php
  //1. Connect to MySQL Server using XAMPP
  
  $username = 'root';
  $conn = new mysqli("localhost", $username, "", "course_calendar");
  $conn->set_charset("utf8mb4");

?>