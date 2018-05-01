<?php
session_start();
include("head.html");
?>
<h2>Goodbye!</h2>

<?php 

//if form is log out button is submitted, end session
if(isset($_POST['submit'])){
	//remove all session variables
	session_unset(); 

	//destroy the session 
	session_destroy();

	echo "You have successfully logged out.";
}

?>
</body>
</html>
