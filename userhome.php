<?php
session_start();
session_regenerate_id(true); 

// var_dump($_SESSION);
// echo "Session ID: " . session_id();

if(!isset($_SESSION["usertype"]))
{
	header("location:login.php");
}
if($_SESSION["usertype"]=='admin')
{
	header("location:adminhome.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $_SESSION["username"]?>'s home</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="userhome.php">Home</a>
        <a href="userdash.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
    <?php echo "<h1 class='head'>Hello, " . $_SESSION["username"] . "!</h1>"; ?>

    <?php
    if(isset ($_POST['str']))
    {
    $ch = curl_init();
    $str=$_POST['str'];

    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $postdata=array(
        "model" => "gpt-3.5-turbo", 
   "messages" => [
         [
            "role" => "user", 
            "content" => $str 
         ] 
      ], 
   "temperature" => 1, 
   "max_tokens" => 256, 
   "top_p" => 1, 
   "frequency_penalty" => 0, 
   "presence_penalty" => 0 
      );
    $postdata=json_encode($postdata);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization:Bearer ';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
    }
    curl_close($ch);
    $result=json_decode($result,true);
    $gptresult=str_replace("\n", '<br>', $result['choices'][0]['message']['content']);
    echo '<p class="gpt">' . $gptresult . '</p>';
    // echo $result['choices'][0]['message']['content'];
    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
}
    ?>
    <form id="f3" name="f3" method="POST">
        <input class="enter" type="text" name="str" placeholder="Get me details of QBurst."required width="100%">
        <button class="button button1" type="submit" name="submit" value="Enter">Submit</button><br>
    </form>
</body>
</html>
<?php
        $host = "localhost";  
        $user = "root";  
        $password = "password";  
        $db = "P";  
      $conn = mysqli_connect($host, $user, $password, $db);  
      if($conn===false) 
      {  
          die("Connection error");  
      } 
        $rusername=$_SESSION["username"];
        $query = "select filename from login where username = '$rusername'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<img src="./image/'.$row['filename'].'"class="image2">';
        }
        ?>