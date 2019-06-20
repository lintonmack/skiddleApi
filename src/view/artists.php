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
?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
