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
$eventsManchester = $eventsSearchRequest->getResultSet();

// include the html header template, with nav bar

$page = "eventsManchester";
include "header.php";

?>
<h1>Events In Manchester</h1>
<?php

if (isset($eventsManchester) && !is_string($eventsManchester)) {
    echo "<div class=\"fluid\">
          <div class=\"card-deck\">";

    //loop over the reuslt set and display below

    $count = 0;
    foreach ($eventsManchester as $key => $event) {
        if ($count % 5 === 0) {
            echo "</div>
                      <div class=\"card-deck\">";
        }
        // build the card and serialize the data prior to transfer it to the next page

        echo "<div class=\"card\">
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
} else {
    //if there was an error just echo the response, unable to get a listing
    echo $eventsManchester;
}

//include the footer, which has the script files
include "footer.php";
?>

