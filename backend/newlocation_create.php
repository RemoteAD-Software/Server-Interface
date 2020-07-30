<!DOCTYPE html>
<html lang="en">
    <head>
        <title> RemoteAD - Location created </title>
        <!-- Page specific CSS -->
        <link rel="stylesheet" type="text/css" href="/css/newitemcreated.css">
    </head>
    <body>


<?php

include "../includes/navbar.php";
require "dbConnect.php";

$uuid = filter_var($_GET['uuid'], FILTER_SANITIZE_STRING);
$name = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
$city = filter_var($_GET['city'], FILTER_SANITIZE_STRING);
$street = filter_var($_GET['street'], FILTER_SANITIZE_STRING);
$streetNumber = filter_var($_GET['streetNumber'], FILTER_SANITIZE_STRING);
$postal = filter_var($_GET['postal'], FILTER_SANITIZE_STRING);
$country = filter_var($_GET['country'], FILTER_SANITIZE_STRING);
$description = filter_var($_GET['description'], FILTER_SANITIZE_STRING);

$push_stmt = "INSERT INTO locations (locationId, locationName, city, street, streetNumber, postal, country, description) VALUES (\"${uuid}\", \"${name}\", \"${city}\", \"${street}\", \"${streetNumber}\", \"${postal}\", \"${country}\", \"${description}\")";

$setNewLocation = $handle->prepare($push_stmt);
$setNewLocation->execute();

$push_stmt = "INSERT into sublocations (locationId, parentLocationId, locationName, tags) VALUES (\"" . uuid() . "\", \"${uuid}\", \"default\", \"\")";
$setNewSubLocation = $handle->prepare($push_stmt);
$setNewSubLocation->execute();

echo "
<div class=\"container\">
    <div class=\"success\">
        <p class=\"title\"> New Location created!</p>
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
                <td class=\"left\"> City </td>
                <td class=\"right\"> ${city} </td>
            </tr>
            <tr>
                <td class=\"left\"> Street </td>
                <td class=\"right\"> ${street} </td>
            </tr>
            <tr>
                <td class=\"left\"> Street Number </td>
                <td class=\"right\"> ${streetNumber} </td>
            </tr>
            <tr>
                <td class=\"left\"> ZIP/Postal Code </td>
                <td class=\"right\"> ${postal} </td>
            </tr>
            <tr>
                <td class=\"left\"> Country </td>
                <td class=\"right\"> ${country} </td>
            </tr>
            <tr>
                <td class=\"left\"> Description </td>
                <td class=\"right\"> ${description} </td>
            </tr>
        </table>
    </div>
</div>";

function uuid(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

?>

</body></html>