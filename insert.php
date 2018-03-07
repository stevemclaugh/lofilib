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


$sql = "INSERT INTO MyGuests (firstname, lastname, email, message)
VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '$_POST[message]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


