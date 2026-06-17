<?php

session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
exit();
}

include("config.php");

$total=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM contacts")
);

$pending=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM contacts WHERE status='Pending'")
);

$resolved=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM contacts WHERE status='Resolved'")
);

?>

<!DOCTYPE html>

<html>
<head>

<title>Analytics Dashboard</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

min-height:100vh;
padding:30px;
}

.container{
max-width:1000px;
margin:auto;
}

.title{
color:white;
font-size:40px;
margin-bottom:30px;
text-align:center;
}

.chart-box{
background:white;
padding:30px;
border-radius:20px;
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

<div class="title">
📊 Contact Analytics Dashboard
</div>

<div class="chart-box">

<canvas id="myChart"></canvas>

</div>

<a
href="admin.php"
class="back">

Back to Admin

</a>

</div>

<script>

const ctx =
document.getElementById('myChart');

new Chart(ctx, {

type:'bar',

data:{

labels:[
'Total',
'Pending',
'Resolved'
],

datasets:[{

label:'Messages',

data:[
<?php echo $total['total']; ?>,
<?php echo $pending['total']; ?>,
<?php echo $resolved['total']; ?>
]

}]

}

});

</script>

</body>
</html>