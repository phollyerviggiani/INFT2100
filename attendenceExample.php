<?php if( $_SERVER["REQUEST_METHOD"] == "POST"){ //when the form is submitted it will be in "POST" mode

    //retrieve info from the form
    $student_number = trim($_POST['number']);
    $first_name = trim($_POST['first']);
    $last_name = trim($_POST['last']);
    $check = trim($_POST['secret']);

    //set up time dependent stuff
    $today = date("Ymd");
    $now = date("Y-m-d G:i:s");

    //here is the file stuff
    $handle = fopen("./attendance/".$today.".txt", 'a');

    fwrite($handle, $now."-".$student_number." - ".$first_name." ".$last_name." ". $check."\n");
    fclose($handle);

    $message .= $now."-".$student_number." - ".$first_name." ".$last_name . " was added to the log<br />";
    $message .= "Click <a href=\"./file2.php\">here</a> to see who is in class"; //echo $message on page
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
    
</body>
</html>