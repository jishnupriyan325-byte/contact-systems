<?php

session_start();

include("config.php");

$error="";

if(isset($_POST['login']))
{

$username=$_POST['username'];

$password=$_POST['password'];

$result=mysqli_query(
$conn,

"SELECT * FROM admin

WHERE username='$username'

AND password='$password'"

);

if(mysqli_num_rows($result)>0)
{

$_SESSION['admin']=$username;

header("Location: admin.php");

exit();

}
else
{

$error="Invalid Username or Password";

}

}

?>

<!DOCTYPE html>

<html>
<head>

<title>Admin Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:
linear-gradient(
135deg,
#0f172a,
#1e293b,
#312e81
);

}

.container{

width:450px;

background:
rgba(255,255,255,.08);

backdrop-filter:blur(20px);

padding:40px;

border-radius:25px;

box-shadow:
0 8px 30px rgba(0,0,0,.3);

color:white;

}

h1{

text-align:center;

margin-bottom:25px;

}

input{

width:100%;

padding:15px;

margin:10px 0;

border:none;

border-radius:12px;

}

button{

width:100%;

padding:15px;

margin-top:15px;

border:none;

border-radius:12px;

cursor:pointer;

font-size:16px;

background:
linear-gradient(
135deg,
#8b5cf6,
#3b82f6
);

color:white;

}

.error{

background:#ef4444;

padding:12px;

border-radius:10px;

margin-bottom:15px;

text-align:center;

}

</style>

</head>

<body>

<div class="container">

<h1>
🔐 Admin Login
</h1>

<?php

if($error!="")
{
echo "<div class='error'>$error</div>";
}

?>

<form method="post">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="login">

Login

</button>

</form>

</div>

</body>
</html>