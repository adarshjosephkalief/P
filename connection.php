<!--  
//     $host = "localhost";  
//     $user = "root";  
//     $password = "password";  
//     $db_name = "P";  
      
//     $con = mysqli_connect($host, $user, $password, $db_name);  
//     if(mysqli_connect_errno()) {  
//         die("Failed to connect with MySQL: ". mysqli_connect_error());  
//     }   -->


<!--  
    $host = "localhost";  
    $user = "root";  
    $password = "password";  
    $db = "P";  
      
    session_start();
    if(!isset($_SESSION["username"]))
    {
	header("location:login.php");
    }

    $data = mysqli_connect($host, $user, $password, $db);  
    if($data===false) {  
        die("Connection error");  
    }  
  -->

  onsubmit="return validation()"

  <script>  
        function validation()  
        {  
            var un=document.f1.username.value;  
            var pw=document.f1.password.value;  
            if(un.length=="" && pw.length=="") {  
                alert("User Name and Password fields are empty");  
                return false;  
            }  
            else  
            {  
                if(un.length=="") {  
                    alert("User Name is empty");  
                    return false;  
                }   
                if (pw.length=="") {  
                alert("Password field is empty");  
                return false;  
                }  
            }                             
        }  
    </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
User page:<?php echo $_SESSION["username"] ?>
<a href="logout.php">Logout</a>
</body>
</html>