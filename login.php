<?
session_start();
// if(isset($_SESSION["username"])){
//      header('Location: logout.php');
//      exit;
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="Login">
        <form id="f1" name="f1" action="authentication.php" method="post"  method="POST">
            <h1 style="font-size: 30px;">Hello.</h1>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" placeholder="Enter Username" required><br>
            <br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="••••••••" required><br>
            <br>
            <button class="button button1" type="submit" name="submit" value="Login">Login</button><br>
            <br>
            <a href="register.html">Not registered?</a>

        </form>
    </div>
</body>
</html>