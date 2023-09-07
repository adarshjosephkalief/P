<?
$host = "localhost";  
    $user = "root";  
    $password = "password";  
    $db = "P";  

    $data = mysqli_connect($host, $user, $password, $db);  
    if($data===false) {  
        die("Connection error");  
    }  
?>