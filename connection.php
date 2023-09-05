<!--  
//     $host = "localhost";  
//     $user = "root";  
//     $password = "password";  
//     $db_name = "P";  
      
//     $con = mysqli_connect($host, $user, $password, $db_name);  
//     if(mysqli_connect_errno()) {  
//         die("Failed to connect with MySQL: ". mysqli_connect_error());  
//     }   -->


<?php    
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
?> 