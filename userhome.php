<?php
session_start();


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
    <title> <?php echo $_SESSION["username"]?>'s dashboard</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="userhome.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>
    User page:<?php echo $_SESSION["username"] ?>
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
    $headers[] = 'Authorization:Bearer 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';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
    }
    curl_close($ch);
    $result=json_decode($result,true);
    echo str_replace("\n", '<br>', $result['choices'][0]['message']['content']);
    // echo $result['choices'][0]['message']['content'];
    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
}
    ?>
    <form id="f3" name="f3" method="POST">
        <input type="text" name="str" placeholder="Get me details of the company QBurst."required width="100%">
        <button class="button button1" type="submit" name="submit" value="Enter">Enter</button><br>
    </form>
</body>
</html>