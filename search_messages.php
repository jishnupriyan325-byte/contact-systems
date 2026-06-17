<?php

session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
exit();
}

include("config.php");

$search="";

if(isset($_GET['search']))
{
$search=$_GET['search'];

$result=mysqli_query(
$conn,

"SELECT * FROM contacts

WHERE

contact_id LIKE '%$search%'

OR

name LIKE '%$search%'

OR

email LIKE '%$search%'

OR

subject LIKE '%$search%'

ORDER BY id DESC"

);
}
else
{
$result=mysqli_query(
$conn,
"SELECT * FROM contacts ORDER BY id DESC"
);
}

?>

<!DOCTYPE html>

<html>
<head>

<title>Search Messages</title>

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
max-width:1200px;
margin:auto;
}

h1{
margin-bottom:20px;
}

.search-box{
display:flex;
gap:10px;
margin-bottom:25px;
}

input{
flex:1;
padding:15px;
border:none;
border-radius:10px;
}

button{
padding:15px 25px;
border:none;
border-radius:10px;
background:#8b5cf6;
color:white;
cursor:pointer;
}

table{
width:100%;
background:white;
color:black;
border-collapse:collapse;
border-radius:15px;
overflow:hidden;
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

.view{
background:#3b82f6;
color:white;
padding:8px 12px;
text-decoration:none;
border-radius:8px;
}

</style>

</head>

<body>

<div class="container">

<h1>
🔎 Search Contact Messages
</h1>

<form method="get">

<div class="search-box">

<input
type="text"
name="search"
placeholder="Search by Contact ID, Name, Email or Subject"
value="<?php echo $search; ?>">

<button type="submit">

Search

</button>

</div>

</form>

<table>

<tr>

<th>ID</th>

<th>Contact ID</th>

<th>Name</th>

<th>Email</th>

<th>Subject</th>

<th>Status</th>

<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['contact_id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['subject']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a
href="view_message.php?id=<?php echo $row['id']; ?>"
class="view">

View

</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>