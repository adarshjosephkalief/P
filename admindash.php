
<?php
session_start();
session_regenerate_id(true); 
// echo "Session ID: " . session_id();
// var_dump($_SESSION);

if(!isset($_SESSION["usertype"]))
{
	header("location:login.php");
}
if($_SESSION["usertype"]=='user')
{
	header("location:userhome.php");
}

?>

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
$rusername=$_SESSION['username'];
$password1=$_POST['password1'];


  $sql="UPDATE login SET first_name = '$first_name', last_name = '$last_name', password = '$password1' WHERE username = '$rusername'";
  if(mysqli_query($conn,$sql))
  {
    echo "<script>
    alert('Sucessfully Updated! Please Login again!');
    window.location.href='logout.php';
     </script>";
  }

  else
{
  echo "<script>
    alert('Error!');
    window.location.href='admindash.php';
     </script>";
}
    }
?>

<?php
error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
 

    $host = "localhost";  
    $user = "root";  
    $password = "password";  
    $datab = "P";  

    $db = mysqli_connect($host, $user, $password, $datab);  
    if($data===false) {  
        die("Connection error");  
    }  
    $rusername=$_SESSION['username'];
    // Get all the submitted data from the form
    $mysql = "UPDATE login SET filename = '$filename' where username = '$rusername'";
 
    // Execute query
    mysqli_query($db, $mysql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<script>
        alert('Image uploaded successfully!');
         </script>";
    } else {
        echo "<script>
        alert('Image uploaded successfully!');
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
    <title> <?php echo $_SESSION["username"]?>'s dashboard</title>
</head>
<body>
    <div class="topnav">
        <a href="adminhome.php">Home</a>
        <a class="active" href="admindash.php">Dashboard</a>
        <a href="adminreg.php">Register</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="updateadmin">
    <form id="f5" name="f5" action="" method="POST">
            <h1 style="font-size: 30px;">Update Profile</h1>
            <label for="first_name">First Name</label><br>
            <input type="text" id="first_name" name="first_name" value="<?php echo $_SESSION['first_name'] ?>" required><br>
            <br>
            <label for="last_name">Last Name</label><br>
            <input type="text" id="last_name" name="last_name" value="<?php echo $_SESSION['last_name'] ?>" required><br>
            <br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" readonly><br>
            <br>
            <label for="username">Username</label><br>
            <input type="text" id="usernamereg" name="usernamereg" value="<?php echo $_SESSION['username'] ?>" readonly><br>
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
            document.getElementById('password2').value != "") 
            {
            alert("Your response is submitted.");
            }
            else {
            alert("Please fill all the fields");
            }
            }
            </script>
        </form>
    </div>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
    
</body>
</html>
