<?php
session_start();
include("head.html");
?>

<?php
$servername = "localhost";
$username = "srm3536";
$password = "inf385m";
$dbname = "lofilib";

$link = mysqli_connect($servername, $username, $password, $dbname);

//if form is filled out, post all fields
if(isset($_POST['user'], $_POST['pw'], $_POST['pw2'], $_POST['email']) && $_POST['user']!='' && $_POST['pw']!=''){
        $libusername = $_POST['user'];
        $libpassword = $_POST['pw'];
	$libpasswordconfirm = $_POST['pw2'];
	$libemail = $_POST['email'];

//confirms the user has entered the same password twice
if($libpassword != $libpasswordconfirm){
	print "The passwords entered do not match. Try again.";
}else{

$userhash = md5($libusername); //hashes the username to create a variable to enter as a unique user_id
$date = date(mdY); //creates a variable with the current date to enter into the date_joined column

//query creates an account account by populating a new row of the users table
mysqli_query($link, "INSERT INTO users (user_id, username, date_joined, email, password) 
VALUES ('$userhash', '$libusername', '$date', '$libemail', '$libpassword')");

print "Your account has been created.";

mysqli_close($link);

}
}else{print "Try again. All fields are required.";} //prompts user to try again if they haven't completely filled out the form
?>
</body>
</html>


