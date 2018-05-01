<?php
session_start();
include ("head.html");
?>

<h2>Login</h2>

<form action="welcome.php" method="post">
Username: <input type="text" name="user"><br>
Password: <input type="password" name="pw"><br>
<input type="submit" name="submit" value="Log in"><br>
<a href="create.php" target="_blank">Create an account</a>


<br />
<?php
echo $_SESSION["favcolor"];
?>

</form>
</body>
</html>
