<?php
session_start();
$greeting_message = "";
$error_message = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = trim($_POST['fName']);

        if(!isset($name) || $name==""){
            $error_message = "You MUST enter your name.";
        }
        elseif(strlen($name) < 5){
            $error_message = "Your name MUST be at least 5 characters.";
        }

        if($error_message==""){
            $greeting_message = "Hello $name";
            $_SESSION['message'] = $greeting_message;
            header("Location:welcome.php");
            ob_flush();
        }
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
    <h1>Week 10</h1>
    <h2><?php //echo $greeting_message;?></h2>
    <form action="./index.php" method="POST">
        <div>
            <label for="">
                First Name:
            </label>
            <input type="text" name="fName">
            <span>
                <?php echo $error_message;?>
            </span>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>