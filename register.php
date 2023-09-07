<?

    include('registerdb.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query    = "INSERT into login (username,password,usertype)
                     VALUES ('$username', '$password', 'user')";
        $result   = mysqli_query($data, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
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
    <div class="Register">
        <form id="f2" name="f2" action="" method="POST">
            <h1 style="font-size: 30px;">Register.</h1>
            <label for="first_name">First Name</label><br>
            <input type="text" id="first_name" name="first_name" placeholder="Enter First Name" required><br>
            <br>
            <label for="last_name">Last Name</label><br>
            <input type="text" id="last_name name="last_name" placeholder="Enter Last Name" required><br>
            <br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Enter Email" required><br>
            <br>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" placeholder="Enter Username" required><br>
            <br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="••••••••" required><br><br>
            <label for="password">Confirm Password</label><br>
            <input type="password" id="password" name="password" placeholder="••••••••" required><br>
            <br>
            <button class="button3 button_3" type="submit" value="Submit">Submit</button><br>
            <br>
            <a href="login.php">Already registered?</a>

        </form>
    </div>
</body>
</html>