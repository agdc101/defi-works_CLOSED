<?php
  $servername = "localhost";
  $username = "root";
  $password = "jupiter68";
  $dbname = "users";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

  $sql = "SELECT FirstName, LastName, Email, PhoneNo, Address1, Address2  FROM members";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $FirstName = $row["FirstName"];
      
    }
  }
  $conn->close();
?>

<form action="formSubmitHandler.php" method="post">
    First name: <input type="text" name="fname"><br>
    Last name: <input type="text" name="lname"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="text" name="userPassword">
    <input type="submit">
</form>



