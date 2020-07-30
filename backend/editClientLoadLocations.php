<?php

require "dbConnect.php";

$pull_stmt = "SELECT locationName,locationId FROM locations";

$getLocations = $handle->prepare($pull_stmt);
$getLocations->execute();

$locations = $getLocations->fetchAll();

$baseEcho = "<select id=\"location\" class=\"noBlur\" name=\"location\">";

foreach($locations as $location) {
    $locationId = $location['locationId'];
    $locationName = $location['locationName'];

    $baseEcho = $baseEcho . "<optgroup label=\"${locationName}\">";
    
    $pull_stmt = "SELECT locationId, locationName FROM sublocations WHERE parentLocationId = \"${locationId}\"";
    
    $getSubLocations = $handle->prepare($pull_stmt);
    $getSubLocations->execute();

    $subLocations = $getSubLocations->fetchAll();

    foreach($subLocations as $subLocation) {
        $subLocationId = $subLocation['locationId'];
        $subLocationName = $subLocation['locationName'];

        $baseEcho = $baseEcho . "<option value=\"${subLocationId}\"> ${subLocationName}</option";
    }

    $baseEcho = $baseEcho . "</optgroup>";
}

$baseEcho = $baseEcho . "</select><br>";

echo $baseEcho;