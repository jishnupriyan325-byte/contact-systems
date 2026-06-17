<?php

include("config.php");

if(isset($_POST['submit']))
{
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    $subject=trim($_POST['subject']);
    $message=trim($_POST['message']);

    if(
        !empty($name) &&
        !empty($email) &&
        !empty($phone) &&
        !empty($subject) &&
        !empty($message)
    )
    {
        $contact_id=
        "CNT".date("Y").rand(1000,9999);

        mysqli_query($conn,

        "INSERT INTO contacts

        (
        contact_id,
        name,
        email,
        phone,
        subject,
        message
        )

        VALUES
        (
        '$contact_id',
        '$name',
        '$email',
        '$phone',
        '$subject',
        '$message'
        )"

        );

        header(
        "Location: success.php?id=$contact_id"
        );
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Contact Support</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
min-height:100vh;
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

padding:20px;
}

.container{
width:650px;

background:
rgba(255,255,255,.08);

backdrop-filter:blur(20px);

padding:40px;

border-radius:30px;

box-shadow:
0 8px 32px rgba(0,0,0,.35);

color:white;
}

h1{
text-align:center;
margin-bottom:10px;
}

.subtitle{
text-align:center;
color:#cbd5e1;
margin-bottom:30px;
}

input,
textarea{

width:100%;

padding:15px;

margin:10px 0;

border:none;

border-radius:12px;

font-size:15px;
}

textarea{
height:140px;
resize:none;
}

button{

width:100%;

padding:15px;

margin-top:15px;

border:none;

border-radius:12px;

font-size:17px;

cursor:pointer;

background:
linear-gradient(
135deg,
#8b5cf6,
#3b82f6
);

color:white;
}

button:hover{
opacity:.9;
}

</style>

</head>

<body>

<div class="container">

<h1>📩 Contact Support</h1>

<p class="subtitle">
Send your query and our team will get back to you.
</p>

<form method="post">

<input
type="text"
name="name"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="tel"
name="phone"
placeholder="Phone Number"
required>

<input
type="text"
name="subject"
placeholder="Subject"
required>

<textarea
name="message"
placeholder="Write your message..."
required></textarea>

<button
type="submit"
name="submit">

Send Message

</button>

</form>

</div>

</body>
</html>