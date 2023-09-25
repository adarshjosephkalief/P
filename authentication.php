<?php
    session_start();
    // if(!isset($_SESSION["username"]))
    // {
	// header("location:login.php");
    // }
    if(isset($_POST['submit']))
    {
   
    $host = "localhost";  
    $user = "root";  
    $password = "password";  
    $db = "P";  

    $data = mysqli_connect($host, $user, $password, $db);  
    if($data===false) {  
        die("Connection error");  
    }  

    $username=$_POST['username'];
    $password = $_POST['password'];
    $sql="select * from login where username = '$username' and password = '$password'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    if ($row) {
        $usertype = $row['usertype'];
        $email = $row['email'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        // $_SESSION['username'] = $username;
        // $_SESSION['usertype'] = $usertype;
    
    if($row['usertype']==='user')
    {

        $_SESSION['username']=$username;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;

        session_regenerate_id(true); 
        header("location:userhome.php");
        exit;
    }
    elseif($row['usertype']==='admin')
    {
        $_SESSION['username']=$username;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        session_regenerate_id(true); 
        header("location:adminhome.php");
        exit;
    }
    }   
    elseif($count !== 1) {
            //  header("location:login.php");
        // echo '<script type="text/javascript">';
        // echo ' alert("username or password is incorrect!")';  //not showing an alert box.
        // echo 'window.location = 'login.php'';
        // echo '</script>';
        echo "<script>
        alert('Username or password is incorrect!');
        window.location.href='login.php';
        </script>";
        //    echo 'username or password is incorrect!';
         }       
        }
        else{
            header("location:login.php");
        }
?>
