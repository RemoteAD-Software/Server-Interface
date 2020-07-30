<?php

require "dbConnect.php";

$form =
"<form class=\"targetForm\" action=\"backend/newsublocation_create.php\">
        <label> Sublocation UUID </label>
        <input type=\"text\" name=\"uuid\" id=\"uuid\" value=\"" . uuid() . "\" readonly><br>

        <label> Sublocation Name </label>
        <input type=\"text\" name=\"name\" id=\"name\" placeholder=\"Name\" required><br>

        <label> Location </label><br>
        <select name=\"location\" id=\"location\">";

$pull_stmt = "SELECT locationId, locationName FROM locations";

$getLocations = $handle->prepare($pull_stmt);
$getLocations->execute();

$locations = $getLocations->fetchAll();

foreach($locations as $location) {
    $id = $location['locationId'];
    $name = $location['locationName'];

    $form = $form . "<option value=\"${id}\"> ${name} </option>";
}

$form = $form . 
"</select><br><label> Sublocation Description </label>
<input type=\"text\" id=\"description\" name=\"description\" placeholder=\"description\"><br>
<div id=\"buttonHolder\">
    <input type=\"submit\" value=\"Submit\" id=\"submit\">
</div></form>";

echo $form;

function uuid(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}