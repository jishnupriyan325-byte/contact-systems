<?php

$id=$_GET['id'] ?? 'N/A';

?>

<!DOCTYPE html>
<html>
<head>

<title>Message Submitted</title>

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
width:600px;

text-align:center;

background:
rgba(255,255,255,.08);

backdrop-filter:blur(20px);

padding:50px;

border-radius:30px;

box-shadow:
0 8px 32px rgba(0,0,0,.35);

color:white;
}

.check{
font-size:90px;
margin-bottom:20px;

animation:
bounce 1s infinite;
}

@keyframes bounce{

0%{
transform:translateY(0);
}

50%{
transform:translateY(-15px);
}

100%{
transform:translateY(0);
}

}

h1{
margin-bottom:15px;
}

.ref{
margin-top:20px;

padding:20px;

background:
rgba(255,255,255,.08);

border-radius:15px;

font-size:22px;

font-weight:bold;
}

.btn{

display:inline-block;

margin-top:30px;

padding:14px 30px;

background:
linear-gradient(
135deg,
#8b5cf6,
#3b82f6
);

color:white;

text-decoration:none;

border-radius:12px;
}

</style>

</head>

<body>

<div class="container">

<div class="check">
✅
</div>

<h1>
Message Submitted Successfully
</h1>

<p>
Thank you for contacting us.
Our support team will get back to you shortly.
</p>

<div class="ref">

Reference ID:

<br><br>

<?php echo $id; ?>

</div>

<a
href="index.php"
class="btn">

Send Another Message

</a>

</div>

</body>
</html>