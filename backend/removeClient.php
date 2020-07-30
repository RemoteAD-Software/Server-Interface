<?php

require "dbConnect.php";

$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

$push_stmt = "DELETE FROM clients WHERE uuid = \"${id}\"";
$removeClient = $handle->prepare($push_stmt);
$removeClient->execute();

echo "OK";

?>