
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

$host = "localhost";  
  $user = "root";  
  $password = "password";  
  $db = "P";  
$conn = mysqli_connect($host, $user, $password, $db);  
if($conn===false) 
{  
    die("Connection error");  
} 

if(isset($_GET['id']))
{
// echo $_GET['id'];
$id=$_GET['id'];
if($id=='1')
{
    echo "<script>
        alert('Warning! ADMIN cannot be removed!');
        window.location.href='admindash.php';
        </script>";
}
else if($id!=='1')
{
$delete="DELETE FROM login WHERE id = $id";
$delquery=mysqli_query($conn,$delete);
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
        <a href="logout.php">Logout</a>
    </div>
    Admin page:<?php echo $_SESSION["username"]."<br>" ?>
    <?php 
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
        $sql="select * from login";
        $result=mysqli_query($data,$sql);
        echo '<table border="1" cellpadding="0">';
        echo "<tr><th>"."id"."</th><th>"."username"."</th><th>"."password"."</th><th>"."usertype"."</th><th>"."first_name"."</th><th>"."last_name"."</th><th>"."email"."</th><th>"."Controls"."</th></tr>";
        while($row=mysqli_fetch_array($result))
        
        {echo "<tr><td>"."$row[id]"."</td><td>"."$row[username]"."</td><td>"."$row[password]"."</td><td>"."$row[usertype]"."</td><td>"."$row[first_name]"."</td><td>"."$row[last_name]"."</td><td>"."$row[email]"."</td><td>".'<a href="admindash.php?id='.$row[id].'" class="rembut rembut1" type="submit" name="remove" value="remove">Remove</a>'."</td></tr>";}
        
        echo "</table>";
    ?>
</body>
</html>