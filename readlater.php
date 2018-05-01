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

//only execute if the Read Later button is clicked
if (isset ($_POST['readlater'])){

echo '<h1>Book Saved</h1>';

//inserts book_id & user_id into the read_later table; connects saved titles to a user so they can have a "read later" list
$sql = "INSERT INTO read_later (book_id, user_id) VALUES ('".$_POST['book_id']."', '".$_SESSION['user_id']."');";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

//Lets the user know the book was successfully saved to their read later list
if ($conn->query($sql) === TRUE) {
    echo "Book saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//Lets the user know if the book was not saved
}else{

echo '<h1>Book Not Saved</h1>';

echo '<p>Invalid value</p>';

}




?>

<br/>
<a href="rate.php">Rate another book</a> | <a href="welcome.php">Return to Homepage</a>

</body>

</html>

