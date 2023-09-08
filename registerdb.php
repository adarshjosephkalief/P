<?
$host = "localhost";  
    $user = "root";  
    $password = "password";  
    $db = "P";  

    $conn = mysqli_connect($host, $user, $password, $db);  
    if($conn===false) 
    {  
        die("Connection error");  
    } 

$username=$_REQUEST['username'];
$password=$_REQUEST['password1'];
$sql="INSERT INTO login (username,password,usertype) VALUES ($username,$password1,user);";

if(mysqli_query($conn,$sql))
{
echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
}

?>



<!-- 
// if (isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $query    = "INSERT into login (username,password,usertype)
//                  VALUES ('$username', '$password', 'user')";
//     $result   = mysqli_query($data, $query);
//     if ($result) {
//         echo "<div class='form'>
//               <h3>You are registered successfully.</h3><br/>
//               <p class='link'>Click here to <a href='login.php'>Login</a></p>
//               </div>";
//     } else 
//     {
//         echo "<div class='form'>
//               <h3>Required fields are missing.</h3><br/>
//               <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
//               </div>";
//     }
// } -->