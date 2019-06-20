<?php

require "../controller/ApiController.php";
require "../model/Artist.php";

use App\Src\Controller\ApiController;
use App\Src\Model\Artist;


if ((isset($_POST['name'])) && (strlen($_POST['name'] < 25))) {
    $artistRequest = new Artist();

    // filter the user input prior to setting it, htmlspecilachars() is used in the setter method too
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $artistRequest->setName($name);
    // peform api getRequest
    $artistRequest->getRequest();
}
$page = "artists";


// include the html header template, with nav bar
include "header.php";

?>
<h1>Artists</h1>
<form class="form-inline md-form mr-auto mb-4" action="artists.php" method="post">
    <input class="form-control mr-sm-2" name="name" type="text" min="1" max="25" placeholder="Search For An Artist"
           aria-label="Search">
    <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit">Search</button>
</form>
<?php
//loop over the reuslt set and display below
if (isset($artistRequest)) {
    $artists = $artistRequest->getResultSet();
    foreach ($artists as $key => $artist) {
        echo "<div class=\"card\" style=\"width: 18rem;\">
                  <img src=\"" . $artist->imageurl . "\" class=\"card-img-top\" alt=\"...\">
                  <div class=\"card-body\">
                      <p class=\"card-text\">" . htmlspecialchars($artist->name) . "</p>
                  </div>
              </div>";
    }
}
//include the footer, which has the script files
include "footer.php";
?>

