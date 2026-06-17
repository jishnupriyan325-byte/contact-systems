<?php

session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
exit();
}

include("config.php");

$id=$_GET['id'];

mysqli_query(
$conn,
"DELETE FROM contacts WHERE id='$id'"
);

header("Location: admin.php");

exit();

?>