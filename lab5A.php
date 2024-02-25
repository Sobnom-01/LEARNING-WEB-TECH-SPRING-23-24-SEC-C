<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $Name = $_POST["name"];
  $Email = $_POST["email"];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $Confirm_password = $_POST['$Confirm_password'];


  $conn = new mysqli('localhost', 'your_username', 'your_password', 'your_database');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $password);

  if ($stmt->execute()) {

    $_SESSION['username'] = $username; // Store username in session
    header("Location: profile.php"); // Redirect to profile page or any other page you want
  } else {

    echo "Error: " . $stmt->error;
  }

  // Close connection
  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
</head>

<body>
  <h2>User Registration</h2>
  <form action="register.php" method="post">
    <label for="Name">Name:</label><br>
    <input type="text" id="Name" name="name" required><br><br>

    <label for="Email">Email:</label><br>
    <input type="Email" id="Email" name="Email" required><br><br>
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <label for="password">Confirm_password:</label><br>
    <input type="confirm_password" id="password" name="password" required><br><br>
    <fieldset>
      <legend>Gender </legend>
      <input type="radio" name="gender" value="" /> Male
      <input type="radio" name="gender" value="" /> Female
      <input type="radio" name="gender" value="" /> Other <br>
    </fieldset>
    <hr>


    </fieldset>
    <fieldset>
      <style>
        .date-input {
          width: 40px;
          /* Adjust width as needed */
          text-align: center;
          border: 1px solid #ccc;
          margin-right: 5px;
          /* Adjust spacing between boxes */
        }
      </style>
      <legend>Date of Birth </legend>
      <input type="text" class="date-input" maxlength="2" placeholder="">
      <span class="separator">/</span>
      <input type="text" class="date-input" maxlength="2" placeholder="">
      <span class="separator">/</span>
      <input type="text" class="date-input" maxlength="4" placeholder="">
      <sub>(dd/mm/yyyy)</sub>
    </fieldset>

    <button type="submit">Register</button>
    <input type="reset" name="button" value="Reset" />
  </form>
</body>

</html>