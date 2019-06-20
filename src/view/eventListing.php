<?php

// template page for showing further details of a single event

// decode the unserialized data to allow it to be used on the page
$event = unserialize(base64_decode($_POST["event"]));

include "header.php";

?>

<div class="card mb-3" style="max-width: 540px;">
    <img src="<?=$event->imageurl?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?=htmlspecialchars($event->eventname)?> At
            <?=htmlspecialchars($event->venue->name)?></h5>
        <p class="card-text"><?=htmlspecialchars(date("l d F Y", strtotime($event->date)))?></p>
        <p class="card-text"><?=htmlspecialchars($event->description)?></p>
        <p class="card-text"><?=htmlspecialchars($event->description)?></p>
        <?php
            if ($event->tickets)
            {
                echo "<p class=\"card-text\">Tickets Available</p>";
            }
        ?>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
</div>

<?php
//include the footer, which has the script files
include "footer.php";
?>