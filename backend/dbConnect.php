<?php

require "dbCredentials.php";

try {
    $handle = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOEXCEPTION $e) {
    die("Failed to connect to the database!");
}
?>