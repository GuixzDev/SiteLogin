<?php
  $servername = "181.215.254.211";
  $username = "root";
  $password = "";
  $dbname = "mydatabase";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);

  $response = array();
  if ($result->num_rows > 0) {
    $response["valid"] = true;
  } else {
    $response["valid"] = false;
  }

  echo json_encode($response);

  $conn->close();
?>
