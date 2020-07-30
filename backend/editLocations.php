<?php

require "dbConnect.php";

$uuid = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
$street = filter_var($_POST['street'], FILTER_SANITIZE_STRING);
$streetNumber = filter_var($_POST['streetNumber'], FILTER_SANITIZE_STRING);
$postal = filter_var($_POST['postal'], FILTER_SANITIZE_STRING);
$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

$push_stmt = "UPDATE locations SET locationName = \"${name}\", city = \"${city}\", street = \"${street}\", streetNumber = \"${streetNumber}\", postal = \"${postal}\", country = \"${country}\", description = \"${description}\" WHERE locationId = \"${uuid}\"";

$updateLocation = $handle->prepare($push_stmt);
$updateLocation->execute();
?>