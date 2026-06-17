<?php

session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
exit();
}

include("config.php");

$id=$_GET['id'];

$result=mysqli_query(
$conn,
"SELECT * FROM contacts WHERE id='$id'"
);

$row=mysqli_fetch_assoc($result);

if(isset($_POST['send_reply']))
{

$reply=$_POST['reply'];

mysqli_query(

$conn,

"INSERT INTO replies
(
contact_id,
reply_message
)

VALUES
(
'$id',
'$reply'
)"

);

echo "<script>alert('Reply Sent Successfully');</script>";

}

?>

<!DOCTYPE html>

<html>
<head>

<title>Reply Message</title>

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
}

.container{
max-width:800px;
margin:auto;
background:white;
padding:30px;
border-radius:20px;
}

h1{
margin-bottom:20px;
}

.info{
margin-bottom:10px;
}

textarea{
width:100%;
height:200px;
padding:15px;
margin-top:20px;
border-radius:10px;
}

button{
margin-top:15px;
padding:15px 25px;
border:none;
border-radius:10px;
background:#22c55e;
color:white;
cursor:pointer;
}

</style>

</head>

<body>

<div class="container">

<h1>
Reply to Contact
</h1>

<div class="info">
<b>Name:</b>
<?php echo $row['name']; ?>
</div>

<div class="info">
<b>Email:</b>
<?php echo $row['email']; ?>
</div>

<div class="info">
<b>Subject:</b>
<?php echo $row['subject']; ?>
</div>

<form method="post">

<textarea
name="reply"
placeholder="Type your reply..."
required></textarea>

<button
type="submit"
name="send_reply">

Send Reply

</button>

</form>

</div>

</body>
</html>