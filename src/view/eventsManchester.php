<?php

// page with hardcoded values to show events within 10 miles of manchester

require "../controller/ApiController.php";
require "../model/Event.php";

use App\Src\Controller\ApiController;
use App\Src\Model\Event;

$eventsSearchRequest = new Event();
$eventsSearchRequest->setCity("Manchester");
$eventsSearchRequest->setRadius(10);
$eventsSearchRequest->getRequest();
// include the html header template, with nav bar

$page = "eventsManchester";
include "header.php";

?>
<h1>Events In Manchester</h1>
<?php
echo "<div class=\"fluid\">
          <div class=\"card-deck\">";
//var_dump($eventsManchesterRequest);
//loop over the reuslt set and display below

    $count = 0;
    $eventsManchester = $eventsSearchRequest->getResultSet();
    foreach ($eventsManchester as $key => $event) {
        if ($count%5===0)
        {
            echo "</div>
                      <div class=\"card-deck\">";
        }
        // build the card and serialize the data prior to transfer it to the next page

        echo "<div class=\"card\">
                  <img src=\"" . $event->imageurl . "\" class=\"card-img-top\" alt=\"...\">
                  <div class=\"card-body\">
                      <p class=\"card-text\">" . htmlspecialchars($event->eventname) . "</p>
                      <form method=\"post\" action=\"eventListing.php\">
                        <input style=\"display: none;\" value=\"". base64_encode(serialize($event)) ."\" name=\"event\">
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

