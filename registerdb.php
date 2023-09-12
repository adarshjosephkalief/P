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
    alert('Sucessfully Registered!');
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
    else{
      header("location:login.php");
    }
?>
