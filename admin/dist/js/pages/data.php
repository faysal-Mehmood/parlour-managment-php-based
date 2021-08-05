<?php

include 'files/functions.php';
include 'db.php';


$check = $mysqli->query("SELECT SUM(views), SUM(visitors), Month(date),date FROM web_statics_for_views_visitors WHERE Month(date) = Month(date) and date < Now() and DATE > NOW() - INTERVAL 6 MONTH GROUP BY Month(date) ;");
$rows = array();
$prefix = '';

echo "labels  :".$prefix . " [\n"; 
while ($row = mysqli_fetch_array($check)){

    echo $prefix . "\n";
    echo "'".getMonthString($row['Month(date)'])."'\n";
    $prefix = ",\n";
}
echo "\n],";
?>