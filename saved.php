<?php
session_start();
include("head.html");
?>


<h3>Saved books</h3>


<?php

//Pull a random book from database
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";

$book_url_prefix = 'https://aura.ischool.utexas.edu/ils/books/';


$sql = "select * from books join read_later on read_later.book_id=books.book_id where user_id='".$_SESSION["user_id"]."' order by title;
";

// echo $sql;

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
	if($row['cover_image'] != ''){
        echo "<img width='120' src='covers/".$row['cover_image']."'/>";
        }
	echo '<br /> Title: ' . $row['title'];
        if ($row['authors'] != '') {
            echo '<br /> Author(s): ' . $row['authors'];
        }
	$ext = pathinfo($row['filename'], PATHINFO_EXTENSION);
        echo '<br /><a href="books/' . $row['filename'] .'">'. strtoupper($ext) .'</a>' ;
        echo '<br /><a href="book.php?id=' . $row['book_id'] .'">Rate</a>' ;
        echo "<br / ><br />";
    }
} else {
    echo "0 results";
}


$conn->close();


?>

<?php
//include("foot.html")
?>
