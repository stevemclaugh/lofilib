<html>
<body>
<h1>Book</h1>

<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "srm3536";

// Create connectionConnection failed: " . $conn->connect_error);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from books where book_id='$_GET[book_id]'";

$echo sql

$result = $conn->query($sql);


//if ($result->num_rows > 0) {
    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}

$conn->close();
?>




</body>
</html>
