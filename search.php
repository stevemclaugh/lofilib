<?php
session_start();
include("head.html");
?>


<h3>Search Results</h3>

<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";


if(($_GET[title]=='') && ($_GET[author]=='') && ($_GET[fulltext]=='')){


echo "No search term entered.";

}else{


if ($_GET[title]!=''){

$sql = "select * from books where title like " . "'%$_GET[title]%'";

}


elseif ($_GET[author]!=''){

$sql = "select * from books where authors like " . "'%$_GET[author]%'";

}


elseif ($_GET[fulltext]!=''){

$sql = "select * from full_text, books where full_text.book_id=books.book_id and text like " . "'%$_GET[fulltext]%'";

}

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
        echo '<br /><a href="book.php?id=' . $row['book_id'] .'">Rate or Save</a>' ;
        echo "<br / ><br />";
    }
} else {
    echo "0 results";
}

$conn->close();


}


?>

</body>
