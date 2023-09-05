<?php
session_start();


if(!isset($_SESSION["usertype"]) || ($_SESSION["usertype"]!=='user'))
{
	header("location:login.php");
}
?>

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