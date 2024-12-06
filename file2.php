
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

    $message = "";
    $today = date("Ymd");
    //here is the file stuff
    $handle = fopen("./attendance/".$today.".txt", 'r');
    while (!feof($handle)) {
        $message .= fgets($handle, 1024);
        $message .= "<br />\n";
        //echo the message somewhere on the page
    }
    fclose($handle);

?>  

<?php 
    echo $message;
?> 
</body>
</html>