<?php

require 'dbConnect.php';

$pull_stmt = "SELECT uuid,locationId,description FROM clients";

$getClients = $handle->prepare($pull_stmt);
$getClients->execute();

$clients = $getClients->fetchAll();

if(sizeof($clients) === 0) {
    echo "<tr class=\"targetTr\"><td class=\"rightest\"> No Clients found</td></tr>";
} else {
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
            <td id=\"description\">${desc}</td>
            <td class=\"rightest\" id=\"id\">${uuid}</td>
            <td class=\"icon rightest\">
            <button onclick=\"editButtonClicked(this)\" class=\"button editButton\" aria-label=\"Edit ${uuid}\">
                <image alt=\"Edit icon\" src=\"../content/edit_icon_16.png\" width=\"16px\" height=\"16px\"></image>
            </button>
            </td>
            <td class=\"icon rightest\">
                <button onclick=\"removeButtonClicked(this)\" class=\"button deleteButton\" aria-label=\"Remove ${uuid}\">
                    <image alt=\"Delete icon\" src=\"../content/delete_icon_16.png\" width=\"16px\" height=\"16px\"></image>
                </button>
            </td>
        </tr>";
    }
}

?>