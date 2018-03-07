<html>
<body>
<h1>Book</h1>

<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";

$sql = "select * from books where book_id='$_GET[book_id]'";

echo $sql;

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query($sql);

//echo $result->num_rows;


echo "<br / ><br />";


if ($result->num_rows > 0) {
//     output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<br /> Title: ' . $row['title'];
        echo '<br /> Authors: ' . $row['authors'];
        echo '<br /> Filename: ' . $row['filename'];
    }
} else {
    echo "0 results";
}

$conn->close();
?>




</body>
           