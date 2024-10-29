<?php
    $title = "Home Page";
    $name = "Patrick";
    $file = "index.php";
    $description = "Home page for INT2100";
    $date = "October 28, 2024";
    $banner = "Week 8: Introduction to PHP";

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

    <table border = "1">
        <tr>
            <th>Num</th>
            <th>Title</th>
            <th>Year</th>
        </tr>
    

    <?php 
        $output = "";

        // Step 1: Connect to Database
        $conn = pg_connect("host=localhost dbname=hollyerp_db user=hollyerp password=100910706");

        // Step 2: Write the SQL statements (Can also use * to select everything)
        $sql = "SELECT movie_num, title, year 
                FROM movies";
        
        // Step 3: Execute the SQL statements (pass through connection and statements)
        //         Use pg_num_rows to pass through the results and loop through the values
        $results = pg_query($conn, $sql);
        $records = pg_num_rows($results);

        // Step 4: Loop through the records, retrieve the fields (.= is the same as +=)
        for ($i=0; $i < $records; $i++){
            $output .= "<tr><td>".pg_fetch_result($results, $i, "movie_num")."</td>".
                       "<td>".pg_fetch_result($results, $i, "title")."</td>".
                       "<td>".pg_fetch_result($results, $i, "year")."</td><tr>";
        }

        echo $output;
    ?>
    </table>

<?php 
    include("./Includes/footer.php");
?>