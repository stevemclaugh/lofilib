<?php
session_start();
include ("head.html");
?>

<h2>Logout</h2>

<form action="goodbye.php" method="post">
<input type="submit" name="submit" value="Log out"><br>


<br />
<?php
echo $_SESSION["favcolor"];
?>

</form>
</body>
</html>
