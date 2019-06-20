<?php

?>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Events App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<?php
$page = "index";
?>
<h1>Welcome To Event App!</h1>
<form class="form-inline md-form mr-auto mb-4" action="artists.php" method="post">
    <input class="form-control mr-sm-2" name="name" type="text" min="1" max="25" placeholder="Search For An Artist" aria-label="Search">
    <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit">Search</button>
</form>

<?php
//include the footer, which has the script files
include "footer.php";
?>