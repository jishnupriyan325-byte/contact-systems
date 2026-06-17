<?php

include("config.php");

$id=$_GET['id'];

$result=mysqli_query(
$conn,
"SELECT * FROM contacts WHERE id='$id'"
);

$row=mysqli_fetch_assoc($result);

if(isset($_POST['resolve']))
{
mysqli_query(
$conn,
"UPDATE contacts
SET status='Resolved'
WHERE id='$id'"
);

header(
"Location: admin.php"
);
exit();
}

?>

<!DOCTYPE html>

<html>
<head>

<title>View Message</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:
linear-gradient(
135deg,
#0f172a,
#1e293b,
#312e81
);

min-height:100vh;

display:flex;
justify-content:center;
align-items:center;

padding:20px;
}

.container{
width:800px;

background:white;

padding:35px;

border-radius:25px;

box-shadow:
0 8px 25px rgba(0,0,0,.3);
}

h1{
margin-bottom:25px;
color:#312e81;
}

.info{
margin-bottom:15px;
font-size:18px;
}

.label{
font-weight:bold;
color:#111827;
}

.message{
background:#f3f4f6;

padding:20px;

border-radius:15px;

margin-top:20px;

line-height:1.8;
}

.btns{
margin-top:25px;
display:flex;
gap:15px;
}

.resolve{
padding:12px 25px;

border:none;

border-radius:10px;

background:#22c55e;

color:white;

cursor:pointer;
}

.back{
padding:12px 25px;

border-radius:10px;

background:#3b82f6;

color:white;

text-decoration:none;
}

</style>

</head>

<body>

<div class="container">

<h1>
📩 Contact Details
</h1>

<div class="info">
<span class="label">
Contact ID:
</span>
<?php echo $row['contact_id']; ?>
</div>

<div class="info">
<span class="label">
Name:
</span>
<?php echo $row['name']; ?>
</div>

<div class="info">
<span class="label">
Email:
</span>
<?php echo $row['email']; ?>
</div>

<div class="info">
<span class="label">
Phone:
</span>
<?php echo $row['phone']; ?>
</div>

<div class="info">
<span class="label">
Subject:
</span>
<?php echo $row['subject']; ?>
</div>

<div class="info">
<span class="label">
Status:
</span>
<?php echo $row['status']; ?>
</div>

<div class="message">
<?php echo nl2br($row['message']); ?>
</div>

<form method="post">

<div class="btns">

<button
type="submit"
name="resolve"
class="resolve">

Mark As Resolved

</button>

<a
href="admin.php"
class="back">

Back

</a>

</div>

</form>

</div>

</body>
</html>