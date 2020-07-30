<?php

require "dbConnect.php";

$uuid = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

$sublocation = filter_var($_POST['location'], FILTER_SANITIZE_STRING);

$pull_stmt = "SELECT parentLocationId FROM sublocations WHERE locationId = \"${sublocation}\"";

$getParentLocation = $handle->prepare($pull_stmt);
$getParentLocation->execute();

$parentLocation = $getParentLocation->fetch();

$parentLocationId = $parentLocation['parentLocationId'];

$push_stmt = "UPDATE clients SET locationId = \"${parentLocationId}\", sublocationId = \"${sublocation}\", description = \"${description}\" WHERE uuid = \"${uuid}\"";

$updateClient = $handle->prepare($push_stmt);
$updateClient->execute();
?>