```php
<?php

$conn = mysqli_connect(
"localhost",
"root",
"",
"contact_system"
);

if(!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

?>
```