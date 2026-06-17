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
"SELECT * FROM activity_log ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html>
<head>

<title>Activity Logs</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{
background:
linear-gradient(
135deg,
#0f172a,
#1e293b,
#312e81
);

padding:30px;
}

.container{
max-width:1000px;
margin:auto;
background:white;
padding:30px;
border-radius:20px;
}

h1{
margin-bottom:25px;
}

table{
width:100%;
border-collapse:collapse;
}

th{
background:#8b5cf6;
color:white;
padding:15px;
}

td{
padding:12px;
border-bottom:1px solid #ddd;
}

</style>

</head>

<body>

<div class="container">

<h1>
📋 Activity Logs
</h1>

<table>

<tr>

<th>ID</th>

<th>Activity</th>

<th>Date</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['activity']; ?></td>

<td><?php echo $row['activity_date']; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>