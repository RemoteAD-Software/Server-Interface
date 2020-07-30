<?php

require 'dbConnect.php';

$pull_stmt = "SELECT videoKey,timesPlayed FROM videoStatistics";

$getStats = $handle->prepare($pull_stmt);
$getStats->execute();

$stats = $getStats->fetchAll();

foreach($stats as $stat) {
    $key = $stat['videoKey'];
    $played = $stat['timesPlayed'];

    echo 
    "<tr class=\"targetTr\">
        <td>${key}</td>
        <td class=\"rightest\">${played}</td>
    </tr>";
}
?>