<?php
session_start();
include("head.html");
?>

<h2>Create New Account</h2>

<form action="accountsuccess.php" method="post">
Choose Username: <input type="text" name="user"><br>
Choose Password: <input type="password" name="pw"><br>
Confirm Password: <input type="password" name="pw2"><br>
E-mail Address: <input type="email" name="email"><br>
<input type="submit" name="submit" value="Log in"><br>

<br />

<?php
//include("foot.html")
?>



