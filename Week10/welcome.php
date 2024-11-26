<?php 
    session_start();
    $greeting_message ="";
        if($_SESSION['message']) {
            $greeting_message = $_SESSION['message'];
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php 
        echo $greeting_message; 
        unset($_SESSION['message'])?></h1>
</body>
</html>