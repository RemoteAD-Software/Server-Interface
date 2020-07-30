<?php

require "dbConnect.php";

$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

$pull_stmt = "SELECT uuid FROM clients WHERE locationId = \"${id}\"";

$getClients = $handle->prepare($pull_stmt);
$getClients->execute();

$clients = $getClients->fetchAll();

$baseEcho = "";
$clientExists = false;

foreach($clients as $client) {
    $clientId = $client['uuid'];
    $baseEcho = $baseEcho . "- ${clientId} \n";
    $clientExists = true;
}

if($clientExists) {
    echo $baseEcho;
} else {

    $push_stmt = "DELETE FROM locations WHERE locationId = \"${id}\"";

    $removeLocation = $handle->prepare($push_stmt);
    $removeLocation->execute();
    
    echo "OK";
}

?>