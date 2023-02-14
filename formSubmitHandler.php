<?php
$servername = "localhost";
$username = "root";
$password = "jupiter68";
$dbname = "users";

$UserFirstName = $_POST['fname'];
$UserLastName = $_POST['lname'];
$UserEmail = $_POST['email'];
$UserPassword = $_POST['userPassword'];

//hash password
$hash = password_hash($UserPassword, PASSWORD_DEFAULT);

echo $hash;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO members (FirstName, LastName, Email, Password) VALUES ('$UserFirstName', '$UserLastName', '$UserEmail', '$hash')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

if (password_verify($UserPassword, $hash)) {
  echo 'password match!';
} else {
  echo 'password does not match';
}

$conn->close();
?>