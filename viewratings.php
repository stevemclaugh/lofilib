<?php
session_start();
include("head.html");
?>


<h3>Ratings</h3>

<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";





$sql = "select ratings.rating, books.title from books join ratings on ratings.book_id=books.book_id order by title";



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query($sql);



echo "<br / >";


if ($result->num_rows > 0) {
    // Output data in each row
    // Conditional below works like a cursor: It evaluates to true and updates the $row variable if there's another row available.

$ratings_array = array();

    while($row = $result->fetch_assoc()) {
        if(array_key_exists($row['title'], $ratings_array )){
            array_push($ratings_array[$row['title']], $row['rating']);
        }else{
        $ratings_array[$row['title']] = array($row['rating']);
    }
    }
} else {
    echo "0 results";
}

$conn->close();

foreach ($ratings_array as $title => $values) {
 echo $title;
 echo '<br />';
$average = array_sum($values)/count($values);
echo "Rating: ";
echo $average;
echo '<br /><br />';
}



?>

</body>
