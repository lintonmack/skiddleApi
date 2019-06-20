<?php

if (isset($page)) {
    $page = $page;
}

// file is to be used as include and the page link highlighted dependant upon what the value of $page is
$pageSelected = [
    "index" => "<a class=\"nav-item nav-link\" href=\"index.php\">Home <span class=\"sr-only\">(current)</span></a>",
    "artists" => "<a class=\"nav-item nav-link\" href=\"artists.php\">Artists<span class=\"sr-only\">
                    (current)</span></a>",
    "searchEvents" => "<a class=\"nav-item nav-link\" href=\"searchEvents.php\">Find Events<span class=\"sr-only\">
                        (current)</span></a>",
    "eventsManchester" => "<a class=\"nav-item nav-link\" href=\"eventsManchester.php\">Find Events Manchester
                           <span class=\"sr-only\">(current)</span></a>"
];

$unselectedPages = [
    "index" => "<a class=\"nav-item nav-link\" href=\"index.php\">Home</a>",
    "artists" => "<a class=\"nav-item nav-link\" href=\"artists.php\">Artists</a>",
    "searchEvents" => "<a class=\"nav-item nav-link\" href=\"searchEvents.php\">Find Events></a>",
    "eventsManchester" => "<a class=\"nav-item nav-link\" href=\"eventsManchester.php\">Find Events Manchester</a>"
]
?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Artists</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Events App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <?php
            foreach ($unselectedPages as $pageToAdd) {
                if ($page === $pageToAdd)
                {
                    echo $pageSelected[$pageToAdd];
                } else {
                    echo $pageToAdd;
                }
            }
            ?>
        </div>
    </div>
</nav>