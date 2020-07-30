<?php

require 'dbConnect.php';

$pull_stmt = "SELECT uuid,locationId,description FROM clients";

$getClients = $handle->prepare($pull_stmt);
$getClients->execute();

$clients = $getClients->fetchAll();

foreach($clients as $client) {
    $uuid = $client['uuid'];
    $locationId = $client['locationId'];

    $pull_stmt = "SELECT locationName FROM locations WHERE locationId = \"${locationId}\"";
    
    $getLocation = $handle->prepare($pull_stmt);
    $getLocation->execute();

    $location = $getLocation->fetch();
    $locationName = $location['locationName'];

    $pull_stmt = "SELECT locationName FROM sublocations WHERE parentLocationId = \"${locationId}\"";

    $getSubLocation = $handle->prepare($pull_stmt);
    $getSubLocation->execute();

    $subLocation = $getSubLocation->fetch();
    $subLocationName = $subLocation['locationName'];

    $desc = $client['description'];

    echo 
    "<tr class=\"targetTr\">
        <td>${locationName}</td>
        <td>${subLocationName}</td>
        <td>${desc}</td>
        <td class=\"rightest\">${uuid}</td>
    </tr>";
}
?>