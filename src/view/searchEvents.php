<?php

// page for users to search event listings by keyword

require "../controller/ApiController.php";
require "../model/Event.php";

use App\Src\Controller\ApiController;
use App\Src\Model\Event;

if ((isset($_POST["keyword"])) && (strlen($_POST["keyword"]) < 35)) {
    // filter the user input prior to setting it, htmlspecilachars() is used in the setter method too
    $keyword = filter_var($_POST['keyword'], FILTER_SANITIZE_STRING);
    $eventSearchRequest = new Event();
    $eventSearchRequest->setKeyword($keyword);
    $eventSearchRequest->getRequest();
    $responseResultSet = $eventSearchRequest->getResultSet();
}

$page = "searchEvents";

// include the html header template, with nav bar
include "header.php";

?>
<h1>Events Search</h1>
<form class="form-inline md-form mr-auto mb-4" action="searchEvents.php" method="post">
    <input class="form-control mr-sm-2" name="keyword" type="text" min="1" max="25" placeholder="Search For An Artist"
           aria-label="Search">
    <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit">Search</button>
</form>
<?php
echo "<div class=\"fluid\">
          <div class=\"card-deck\">";
//var_dump($eventsManchesterRequest);
//loop over the reuslt set and display below

$count = 0;
foreach ($responseResultSet as $key => $event) {
    if ($count % 5 === 0) {
        echo "</div>
                      <div class=\"card-deck\">";
    }
    // build the card and serialize the data prior to transfer it to the next page

    echo "<div class=\"card\" style=\"max-width: 540px;\">
                  <img src=\"" . $event->imageurl . "\" class=\"card-img-top\" alt=\"...\">
                  <div class=\"card-body\">
                      <p class=\"card-text\">" . htmlspecialchars($event->eventname) . "</p>
                      <form method=\"post\" action=\"eventListing.php\">
                        <input style=\"display: none;\" value=\"" . base64_encode(serialize($event)) . "\" name=\"event\">
                        <input type=\"submit\" value=\"View Event\">
                      </form>
                  </div>
              </div>";
    $count++;
}

echo "</div>
              </div>";

//include the footer, which has the script files
include "footer.php";
?>