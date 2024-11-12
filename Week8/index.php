<?php
    $title = "Home Page";
    $name = "Patrick";
    $file = "index.php";
    $description = "Home page for INT2100";
    $date = "October 28, 2024";
    $banner = "Week 8: Introduction to PHP";
    
    // Setting global variables - the get funtion returns the key-value pair
    // In this case, the key we're looking for is 'year', if in the URL theres a year = "x" value
    // display the value
    if(isset($_GET['year'])){
        $y = $_GET['year'];
    }
    else{
        $y = "No Data";
    }

    if(isset($_GET['x'])){
        $x = $_GET['x'];
    }
    else{
        $x = "No Data but this is x not year";
    }
    
    include("./Includes/header.php");
?>

    <?php
        echo "<h2>Welcome to PHP</h2>";
    ?>
    <?php 
        $num1 = 5;
        $num2 = 7;
        $result  = $num1 * $num2;
        echo "<p>The product of $num1 and $num2 is $result</p>";
    ?>

    <h3><?php echo $y;?></h3>
    <h3><?php echo $x;?></h3>

    <table class="table table-striped-columns">
        <tr>
            <th>Num</th>
            <th>Title</th>
            <th>Year</th>
        </tr>
    

    <?php 
        $output = "";

        // Step 1: Connect to Database (using the function in the functions.php file)
        $conn = db_connect();

        // Step 2: Write the SQL statements (Can also use * to select everything)
        $sql = "SELECT movie_num, title, year 
                FROM movies
                WHERE year < $1 AND year > $2";

        // To protect from data, we make a prepared statement, this needs the connection variable, name of it, and sql statment
        $stmt = pg_prepare($conn, 'movie_retrieve', $sql);
        
        // Step 3: Execute the SQL statements (pass through connection and statements)
        //         Use pg_num_rows to pass through the results and loop through the values
        // $results = pg_query($conn, $sql);

        // Step 3 but using the prepared statement method
        // use pg_execute method, pass through connection variable, statement name, and array method
        $results = pg_execute($conn, 'movie_retrieve', array($y, $x));
        $records = pg_num_rows($results);

        // Step 4: Loop through the records, retrieve the fields (.= is the same as +=)
        for ($i=0; $i < $records; $i++){
            $output .= "<tr><td>".pg_fetch_result($results, $i, "movie_num")."</td>".
                       "<td>".pg_fetch_result($results, $i, "title")."</td>".
                       "<td>".pg_fetch_result($results, $i, "year")."</td></tr>";
        }
        echo $output;
    ?></table>

<?php 
    include("./Includes/footer.php");
?>