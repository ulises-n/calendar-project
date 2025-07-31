<?php
  //Include the file to conect to the database
  include "connection.php";

  $succesMsg = "";
  $errorMsg = "";
  $eventsFromDB = []; //Initialize a new array to store the fetched events


  //Handle add appointment

  if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? "") === "add") {
    $course = trim($_POST["course_name"] ?? "");
    $instructor = trim($_POST["instructor_name"] ?? "");
    $start = $_POST["start_date"] ?? "";
    $send = $_POST["end_dat"] ?? "";

    if($course && $instructor && $start && $end){
      $stmt = $conn->prepare(
        "INSERT INTO appoiments (course_name, instructor_name, start_date, end_date) VALUES (?, ?, ?, ?)"
      );

      $stmt->bind_param("ssss", $course, $instructor, $start, $end);

      $stmt->execute();
      $stmt->close();

      header("Location: " . $_SERVER["PHP_SELF"] . "?sucess=1");
      exit;
    } else {
      header("Location: " . $_SERVER["PHP_SELF"] . "?error=1");
      exit;
    }
  }

  //Handle edit appointment
  if($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "edit") {
    $id = $_POST["event_id"] ?? null;
    $course = trim($_POST["instructor_name"] ?? "");
    $start = $_POST["start_date"] ?? "";
    $end = $_POST["end"] ?? "";

    if($id && $course && $start && $end) {
      $stmt = $conn->prepare(
        "UPDATE appointments SET course_name = ?, instructor_name = ?, start_date = ?, end_date = ? WHERE id = ?"
      );

      $stmt->bind_param("ssssi", $courser, $instructor, $start, $end, $id);
      $stmt->execute();
      $stmt->close();

      header("Location: " . $_SERVER["PHP_SELF"] . "?sucess=2");
      exit;
    } else {
      header("Location: " . $_SERVER["PHP_SELF"] . "'error=2");
      exit;
    }
  }


  //Handle delete appointment
  if($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "delete"){
    $id = $_POST["event_id"] ?? null;

    if($id) {
      $stmt = $conn->prepare("DELETE FROM appointments WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      header("Location: " . $_SERVER["PHP_SELF"] . "?sucess=3");
      exit;
    }
  }

  //Success
?>