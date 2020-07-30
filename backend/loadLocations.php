<?php

require "dbConnect.php";

$pull_stmt = "SELECT * FROM locations";

$getLocations = $handle->prepare($pull_stmt);
$getLocations->execute();

$locations = $getLocations->fetchAll();

if(sizeof($locations) === 0) {
    echo "<tr class=\"targetTr\"><td class=\"rightest\"> No Locations found</td></tr>";
} else {
    foreach($locations as $location) {
        $id = $location['locationId'];
        $name = $location['locationName'];
        $city = $location['city'];
        $street = $location['street'];
        $streetNumber = $location['streetNumber'];
        $postal = $location['postal'];
        $country = $location['country'];
        $description = $location['description'];
    
        echo "
        <tr class=\"targetTr\">
            <td id=\"name\"> ${name} </td>
            <td id=\"city\"> ${city} </td>
            <td id=\"street\"> ${street} </td>
            <td id=\"streetNumber\" class=\"wider\"> ${streetNumber} </td>
            <td id=\"postal\" class=\"wider\"> ${postal} </td>
            <td id=\"country\" class=\"wider\"> ${country} </td>
            <td id=\"description\"> ${description} </td>
            <td id=\"id\" class=\"rightest\"> ${id} </td>
            <td class=\"icon rightest\">
                <button onclick=\"editButtonClicked(this)\" class=\"button editButton\" aria-label=\"Edit ${name}\">
                    <image alt=\"Edit icon\" src=\"../content/edit_icon_16.png\" width=\"16px\" height=\"16px\"></image>
                </button>
            </td>
            <td class=\"icon rightest\">
                <button onclick=\"removeButtonClicked(this)\" class=\"button deleteButton\" aria-label=\"Delete ${name}\">
                    <image alt=\"Remove icon\" src=\"../content/delete_icon_16.png\" width=\"16px\" height=\"16px\"></image>
                </button>
            </td>
        </tr>
        ";
    }
}

