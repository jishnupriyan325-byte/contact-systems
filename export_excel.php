<?php

session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
exit();
}

include("config.php");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=contact_messages.xls");

echo "ID\t";
echo "Contact ID\t";
echo "Name\t";
echo "Email\t";
echo "Phone\t";
echo "Subject\t";
echo "Status\t";
echo "Date\n";

$result=mysqli_query(
$conn,
"SELECT * FROM contacts ORDER BY id DESC"
);

while($row=mysqli_fetch_assoc($result))
{

echo $row['id']."\t";

echo $row['contact_id']."\t";

echo $row['name']."\t";

echo $row['email']."\t";

echo $row['phone']."\t";

echo $row['subject']."\t";

echo $row['status']."\t";

echo $row['created_at']."\n";

}

exit();

?>