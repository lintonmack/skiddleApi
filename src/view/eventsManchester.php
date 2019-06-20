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
