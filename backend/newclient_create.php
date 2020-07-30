<!DOCTYPE html>
<html lang="en">
    <head>
        <title> RemoteAD - Client created </title>
        <!-- Page specific CSS -->
        <link rel="stylesheet" type="text/css" href="/css/newitemcreated.css">
    </head>
    <body>

<?php
include "../includes/navbar.php";
require "dbConnect.php";

$uuid = filter_var($_GET['uuid'], FILTER_SANITIZE_STRING);
$subLocationId = filter_var($_GET['location'], FILTER_SANITIZE_STRING);
$description = filter_var($_GET['clientDescription'], FILTER_SANITIZE_STRING);

$pull_stmt = "SELECT parentLocationId,locationName FROM sublocations WHERE locationId = \"$subLocationId\"";

$getLocation = $handle->prepare($pull_stmt);
$getLocation->execute();

$location = $getLocation->fetch();

$parentLocationId = $location['parentLocationId'];
$sublocationName = $location['locationName'];

$push_stmt = "INSERT INTO clients (uuid, locationId, sublocationId, description) VALUES (\"${uuid}\", \"${parentLocationId}\", \"${subLocationId}\", \"$description\")";

$setNewClient = $handle->prepare($push_stmt);
$setNewClient->execute();

$pull_stmt = "SELECT locationName FROM locations WHERE locationId = \"$parentLocationId\"";

$getLocation = $handle->prepare($pull_stmt);
$getLocation->execute();

$location = $getLocation->fetch();
$locationName = $location['locationName'];

echo "
<div class=\"container\">
    <div class=\"success\">
        <p class=\"title\">New Client created!</p>
        <table class=\"target\">
            <tr>
                <td class=\"left\"> UUID </td>
                <td class=\"right\"> ${uuid} </td>
            </tr>
            <tr>
                <td class=\"left\"> Location </td>
                <td class=\"right\"> ${locationName} </td>
            </tr>
            <tr>
                <td class=\"left\"> Sublocation </td>
                <td class=\"right\"> ${sublocationName} </td>
            </tr>
            <tr>
                <td class=\"left\"> Description </td>
                <td class=\"right\"> ${description} </td>
            </tr>
        </table>
    </div>
</div>";
?>

</body></html>