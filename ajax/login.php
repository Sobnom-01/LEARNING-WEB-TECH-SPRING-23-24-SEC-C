<?php 
sleep(5);
$username = $_REQUEST['username'];
echo "Your Username is: " . $username;
    //Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once '../MODEL/model.php';
    //$connection=mysqli_connect("localhost","root","","vehicle management");



    session_start();
    $msg = "";

    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($connection, strtolower($_POST['username']));
        $password = mysqli_real_escape_string($connection, $_POST['password']); 
        
       // Debug: Print SQL query
        $login_query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        echo "Debug: SQL Query: " . $login_query . "<br>";
        
        $login_res = mysqli_query($connection, $login_query);
    
        if($login_res) {
            if(mysqli_num_rows($login_res) > 0){ 
                $_SESSION['username'] = $username;
                header('Location:index.php');
                exit;
            } 
            else {
                 $msg = '<div class="alert alert-danger alert-dismissable" style="margin-top:30px";>
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                 <strong>Unsuccessful!</strong> Login Unsuccessful.
               </div>';
            }
        } 
        else {
           //  Display MySQL error message
            $msg = 'MySQL Error: ' . mysqli_error($connection);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
    <title>Login</title> 
</head>
<body> 
    <?php include 'navbar.php'; ?>
   
    <br>
    
    <?php echo $msg; ?>
            
    <h1 style="text-align: center;">Login</h1>      
          
    <form action="" method="post"> 
        <input id="username" type="text" name="username" placeholder="username"><br>
        <input id="password" type="password" name="password" placeholder="Password"><br> 
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        <button[type="submit"]:hover {
            background-color: #45a049;
        }
    </form>  
    <br> 
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username.trim() === "") {
                alert("Username cannot be empty!");
                document.getElementById("username").focus();
                return false;
            }

            if (password !== confirm_password) {
                alert("Passwords do not match!");
                document.getElementById("confirm_password").focus();
                return false;
            }
            return true;
        }
    </script>

    <a href="login_admin.php">Admin Login</a>
  
</body>
</html>
