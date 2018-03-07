
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>lofilib | book</title>
</head>

<h1>Book</h1>

<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";


$sql = "select * from books where title=" . "'$_GET[title]'";

echo $sql;

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query($sql);

//echo $result->num_rows;


echo "<br / >";


if ($result->num_rows > 0) {
    // Output data in each row
    // Conditional below works like a cursor: It evaluates to true and updates the $row variable if there's another row available.
    while($row = $result->fetch_assoc()) {
        echo '<br /> Title: ' . $row['title'];
        if ($row['authors'] != '') {
            echo '<br /> Authors: ' . $row['authors'];
        }
        echo '<br /> Filename: ' . $row['filename'];
    }
} else {
    echo "0 results";
}

$conn->close();




?>

</body>
           
