<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Email Registration Form</title>
</head>
<body>
<h2> Registration Form</h2>
<form action="validate.php" method="post">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required><br><br>
    
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required><br><br>
    
    <label for="dob">Date of Birth:</label>
    <select id="dob" name="dob" required>
        <option value="">Select Date</option>
        <?php
        for ($i = 1; $i <= 31; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select>
    <select id="month" name="month" required>
        <option value="">Select Month</option>
        <?php
        $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        foreach ($months as $key => $value) {
            $num = $key + 1;
            echo "<option value=\"$num\">$value</option>";
        }
        ?>
    </select>
    <select id="year" name="year" required>
        <option value="">Select Year</option>
        <?php
        for ($i = 1900; $i <= 2016; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select><br><br>
    
    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="male" required>
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female" required>
    <label for="female">Female</label><br><br>
    
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    
    <input type="submit" value="Submit">
</form>
</body>
</html>
