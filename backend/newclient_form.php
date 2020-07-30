<?php

require "dbConnect.php";

$pull_stmt = "SELECT locationName, locationId FROM locations";

$getLocations = $handle->prepare($pull_stmt);
$getLocations->execute();

$locations = $getLocations->fetchAll();

$baseEcho = 
"<form action=\"/backend/newclient_create.php\" class=\"targetForm\">
    <label> Client UUID </label><br>
    <input type=\"text\" id=\"uuid\" name=\"uuid\" placeholder=\"UUID\" value=\"" . uuid() . "\" readonly><br>

    <label> Client Location </label><br>
    <select name=\"location\" id=\"location\">";
    
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

        $baseEcho = $baseEcho . "<option value=\"${subLocationId}\">${subLocationName}</option>";
    }

    $baseEcho = $baseEcho . "</optgroup>";
}

$baseEcho = $baseEcho .
    "</select><br><label> Client Description </label></br>
    <input type=\"text\" id=\"clientDescription\" name=\"clientDescription\" placeholder=\"Description\" required><br>
    <div id=\"buttonHolder\">
        <input type=\"submit\" value=\"Submit\" id=\"submit\">
    </div></form>";


echo $baseEcho;

function uuid(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
?>