<?php
// MORE EXAMPLES IN TERM TEST 2 FOLDER OF DC CONNECT
// start the session
session_start();
$_SESSION['name'] = "Your Name";
$_SESSION['user_id'] = "12345";
$_SESSION['password'] = "MyPW";
?>

<strong>Session currently contains:</strong><br />
<p>Session Id: <em><?php echo session_id(); ?> </em></p>
<pre><?php print_r($_SESSION); ?></pre>
<br />
<p>To see something specific, you just need to reference
    the array element by name:
    <b><?php echo $_SESSION['name']; ?></b>
</p>
<p>Let's see what happens on the <a
        href="next_page.php">next page.</a></p>