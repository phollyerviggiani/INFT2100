<?php 
function db_connect(){
    return pg_connect("host=localhost dbname=hollyerp_db user=hollyerp password=100910706");
};
?>
