<?php

session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
exit();
}

include("config.php");

$result=mysqli_query(
$conn,
"SELECT * FROM notifications ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html>
<head>

<title>Notifications</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{
background:#0f172a;
padding:30px;
color:white;
}

.container{
max-width:900px;
margin:auto;
}

h1{
margin-bottom:25px;
}

.notification{

background:white;

color:black;

padding:20px;

margin-bottom:15px;

border-radius:15px;

box-shadow:
0 5px 15px rgba(0,0,0,.2);
}

.time{
color:gray;
font-size:14px;
margin-top:8px;
}

.back{
display:inline-block;
margin-top:20px;
padding:12px 20px;
background:#8b5cf6;
color:white;
text-decoration:none;
border-radius:10px;
}

</style>

</head>

<body>

<div class="container">

<h1>
🔔 Notifications
</h1>

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="notification">

<?php echo $row['message']; ?>

<div class="time">

<?php echo $row['created_at']; ?>

</div>

</div>

<?php
}
?>

<a href="admin.php" class="back">

Back to Dashboard

</a>

</div>

</body>
</html>