<?
session_start();
if(isset($_SESSION["username"])){
     header('Location: logout.php');
     exit;
}
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
        <form id="f1" name="f1" action="authentication.php" method="post" onsubmit="return validation()" method="POST">
            <h1 style="font-size: 30px;">Hello.</h1>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" placeholder="Enter Username"><br>
            <br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="••••••••"><br>
            <br>
            <button class="button button1" type="submit" name="submit" value="Login">Login</button><br>
            <br>
            <a href="register.html">Not registered?</a>

        </form>
    </div>
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


</body>
</html>