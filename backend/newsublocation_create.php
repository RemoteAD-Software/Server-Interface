<!DOCTYPE html>
<html lang="en">
    <head>
        <title> RemoteAD - Sublocation created </title>
        <!-- Page specific CSS -->
        <link rel="stylesheet" type="text/css" href="/css/newitemcreated.css">
    </head>
    <body>

<?php

require "dbConnect.php";
include "../includes/navbar.php";

$uuid = filter_var($_GET['uuid'], FILTER_SANITIZE_STRING);
$location = filter_var($_GET['location'], FILTER_SANITIZE_STRING);
$name = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
$description = filter_var($_GET['description'], FILTER_SANITIZE_STRING);

$push_stmt = "INSERT INTO sublocations(locationId, parentLocationId, locationName, locationDescription, tags) VALUES (\"${uuid}\", \"${location}\", \"${name}\", \"${description}\", \"\")";

$setSubLocation = $handle->prepare($push_stmt);
$setSubLocation->execute();

$pull_stmt = "SELECT locationName FROM locations WHERE locationId = \"${location}\"";

$getLocation = $handle->prepare($pull_stmt);
$getLocation->execute();

$location = $getLocation->fetch();
$locationName = $location['locationName'];

echo "
<div class=\"container\">
    <div class=\"success\">
        <p class=\"title\"> New Sublocation created! </p>
        <table class=\"target\">
            <tr>
                <td class=\"left\"> UUID </td>
                <td class=\"right\"> ${uuid} </td>
            </tr>
            <tr>
                <td class=\"left\"> Name </td>
                <td class=\"right\"> ${name} </td>
            </tr>
            <tr>
                <td class=\"left\"> Location </td>
                <td class=\"right\"> ${locationName} </td>
            </tr>
            <tr>
                <td class=\"left\"> Description </td>
                <td class=\"right\"> ${description} </td>
            </tr>
        </table
    </div>
</div>";
?>

</body></html>