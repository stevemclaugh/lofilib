<?php
session_start();
include("head.html");
?>
<h2>Welcome!</h2>

<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";

$link = mysqli_connect($servername, $username, $password, $dbname);


//if form is filled out, post username & pw
if(isset($_POST['user'])){
	$libusername = $_POST['user'];
	$libpassword = $_POST['pw'];
}

$results = mysqli_query($link, "SELECT user_id, password from users WHERE username='$libusername'");

//compares the password entered on the login form to the user's password in the database
while($row = mysqli_fetch_array($results)){
	if ($row[password] == $libpassword){
		print "Login successful.<br />";
                $_SESSION["logged_in"] = TRUE; //begins session if password matches
                $_SESSION["user_id"] = $row['user_id'];
        }
	else {
		print "Login failed."; //Failed login message if password does not match
	}
}

mysqli_close($link);

//Pull a random book from database
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";

$book_url_prefix = 'https://aura.ischool.utexas.edu/ils/books/';


$sql = "select * from books order by rand() limit 5";

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
        echo '<br /><a href="book.php?id=' . $row['book_id'] .'">Rate or Save</a>' ;
        echo "<br / ><br />";
    }
} else {
    echo "0 results";
}


$conn->close();


?>
</body>
</html>
