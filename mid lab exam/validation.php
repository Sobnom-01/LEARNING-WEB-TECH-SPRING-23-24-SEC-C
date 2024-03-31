<?php
require_once 'Document.php';
session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dob_day = $_POST['dob'];
$dob_month = $_POST['month'];
$dob_year = $_POST['year'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$errors = array();


if (empty($firstname) || empty($lastname)) {
  $errors[] = "First Name and Last Name cannot be empty.";
} elseif (!strpos("/^[a-zA-Z.-]+,$/", $firstname) || !strpos("/^[a-zA-Z.-]+$/", $lastname)) {
  $errors[] = "First Name and Last Name must contain only letters, dots, or dashes.";
}

// Email validation
if (empty($email)) {
  $errors[] = "Email cannot be empty.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Invalid email format.";
}

// Gender validation
if (empty($gender)) {
  $errors[] = "Gender must be selected.";
}

// Date of Birth validation
if (empty($dob_day) || empty($dob_month) || empty($dob_year)) {
  $errors[] = "Date of Birth cannot be empty.";
} elseif (!checkdate($dob_month, $dob_day, $dob_year)) {
  $errors[] = "Invalid date of birth.";
}

// Display errors if any
if (!empty($errors)) {
  echo "<h2>Error(s):</h2>";
  foreach ($errors as $error) {
    echo "<p>$error</p>";
  }
} else {
  // Form is valid, do something with the data
  echo "<h2>Form submitted successfully!</h2>";
}
?>