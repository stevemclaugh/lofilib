<?php
session_start();
include("head.html");
?>


<p>
<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";

if ($_POST['rating']>0 && $_POST['rating']<6){

echo '<h1>Rating Complete</h1>';

$sql = "INSERT INTO ratings (book_id, user_id, rating) VALUES ('".$_POST['book_id']."', '".$_SESSION['user_id']."', ".$_POST['rating'].");";


//echo $sql;

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


if ($conn->query($sql) === TRUE) {
    echo "Rating entered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}else{

echo '<h1>Rating Not Complete</h1>';

echo '<p>Invalid value</p>';

}




?>

<br/>
 <a href="welcome.php">Return to Homepage</a>

</body>

</html>





