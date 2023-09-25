<?php
    if(isset($_POST['submit']))
    {
  $host = "localhost";  
  $user = "root";  
  $password = "password";  
  $db = "P";  
$conn = mysqli_connect($host, $user, $password, $db);  
if($conn===false) 
{  
    die("Connection error");  
} 

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$rusername=$_POST['usernamereg'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];

$validuser="SELECT id FROM login WHERE username = '$rusername'";
$validation=mysqli_query($conn,$validuser);
$count=mysqli_num_rows($validation);

if($count==0)
{
  $sql="INSERT INTO login (username,password,usertype,first_name,last_name,email) VALUES ('$rusername','$password1','user','$first_name','$last_name','$email')";
  if(mysqli_query($conn,$sql))
  {
    echo "<script>
    alert('Sucessfully Registered! Please Login to continue!');
    window.location.href='login.php';
     </script>";
  }
}
  else
{
  echo "<script>
    alert('Username already taken!');
    window.location.href='register.php';
     </script>";
} 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>    
</head>
<body>
    <div class="Register">
        <form id="f2" name="f2" action="" method="POST">
            <h1 style="font-size: 30px;">Register.</h1>
            <label for="first_name">First Name</label><br>
            <input type="text" id="first_name" name="first_name" placeholder="Enter First Name" required><br>
            <br>
            <label for="last_name">Last Name</label><br>
            <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name" required><br>
            <br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Enter Email" required><br>
            <br>
            <label for="username">Username</label><br>
            <input type="text" id="usernamereg" name="usernamereg" placeholder="Enter Username" required><br>
            <br>
            <label for="password1">Password</label><br>
            <input type="password" id="password1" name="password1" placeholder="••••••••" required><br><br>
            <label for="password2">Confirm Password</label><br>
            <input type="password" id="password2" name="password2" placeholder="••••••••" required onkeyup="validate_password()"><br>
            <br>
            <span id="wrong_pass_alert"></span>
            <button id="create" class="button0" name="submit" type="submit" value="submit" onclick ="wrong_pass_alert()">Submit</button><br>
            <br>
            <script>
            function validate_password() {

            var pass = document.getElementById('password1').value;
            var confirm_pass = document.getElementById('password2').value;
            if (pass != confirm_pass) {
            document.getElementById('wrong_pass_alert').style.color = 'red';
            document.getElementById('wrong_pass_alert').innerHTML
            = '😔 Password Mismatched';
            document.getElementById('create').disabled = true;
            document.getElementById('create').style.opacity = (0.4);
            } else {
            document.getElementById('wrong_pass_alert').style.color = 'green';
            document.getElementById('wrong_pass_alert').innerHTML =
            '😀 Password Matched';
            document.getElementById('create').disabled = false;
            document.getElementById('create').style.opacity = (1);
            }
            }

            function wrong_pass_alert() {
            if (document.getElementById('password1').value != "" &&
            document.getElementById('password2').value != "") {
            alert("Your response is submitted");
            } else {
            alert("Please fill all the fields");
            }
            }
            </script>
            <a href="login.php">Already registered?</a>

        </form>
    </div>
</body>
</html>