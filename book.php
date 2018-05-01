<?php
session_start();
include("head.html");
?>




<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";

$book_url_prefix = 'https://aura.ischool.utexas.edu/ils/books/';


$sql = "select * from books where book_id=" . "'$_GET[id]'";

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


        $title = $row['title'];

        echo '<br /> Title: ' . $title;
        if ($row['authors'] != '') {
            echo '<br /> Authors: ' . $row['authors'];
        }
        echo '<br /> File: <a href="' . $book_url_prefix . $row['filename'].'">PDF</a>';
    }
} else {
    echo "0 results";
}

$conn->close();

// Getting book's rating

$sql = "select ratings.rating, books.title from books join ratings on ratings.book_id=books.book_id where books.title='".$title."'";

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

$ratings = array();

    while($row = $result->fetch_assoc()) {

        array_push($ratings, $row['rating']);
    }

    if(count($ratings)>0){
    $average = array_sum($ratings)/count($ratings);
    echo "Rating: ";
    echo $average;
    }
    echo '<br /><br />';
}else{
echo $title;
}

$conn->close();








?>

<p>Enter a rating from 1 to 5:</p>
<form action='rate.php' method='post'>
<input type="number" name="rating" />

<input type="hidden" name="book_id" value="<?php echo $_GET['id'];?>" />

<input type="submit" value="Rate" />

</form>

<form action='readlater.php' method='post'>
<input type="hidden" name="book_id" value="<?php echo $_GET['id'];?>" />
<input type="submit" name="readlater" value="Save for Later"/>

</form>

</body>

</html>
