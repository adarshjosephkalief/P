<!--      
    // include('connection.php');  
    // $username = $_POST['username'];  
    // $password = $_POST['password'];  
      
    //     //to prevent from mysqli injection  
    //     $username = stripcslashes($username);  
    //     $password = stripcslashes($password);  
    //     $username = mysqli_real_escape_string($con, $username);  
    //     $password = mysqli_real_escape_string($con, $password);  
      
    //     $sql = "select *from login where username = '$username' and password = '$password'";  
    //     $result = mysqli_query($con, $sql);  
    //     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    //     $count = mysqli_num_rows($result);  
          
    //     if($count == 1){  
    //         header("Location: dashboard.html");
    //         die();
    //     }  
    //     else{  
    //         echo "<h1> Login failed. Invalid username or password.</h1>";  
    //     }    -->
  
<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
	header("location:login.php");
    }
    include('connection.php');
    $username=$_POST['username'];
    $password = $_POST['password'];
    var_dump($_POST);

    $sql="select * from login where username = '$username' and password = '$password'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    if ($row) {
        $usertype = $row['usertype'];
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $usertype;
    
    if($row['usertype']==='user')
    {

        $_SESSION['username']=$username;
        $_SESSION['usertype'] = $usertype;
        header("location:userhome.php");
        exit;
    }
    elseif($row['usertype']==='admin')
    {
        $_SESSION['username']=$username;
        $_SESSION['usertype'] = $usertype;
        header("location:adminhome.php");
        exit;
    }
    else echo 'username or password is incorrect!';
}
?>
