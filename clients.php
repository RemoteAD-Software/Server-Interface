<!DOCTYPE html>
<html lang="en">
    <head>
        <title> RemoteAD Clients</title>
        <!-- CSS Page specific -->
        <link rel="stylesheet" type="text/css" href="css/tables.css">

        <!-- Page specific scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/clientsButton.js"></script>
        <script src="js/editClientPopup.js"></script>

    </head>
    <body>

    <?php
        include "includes/navbar.php";
    ?>
        <div class="container">
            <div class="formHolder">
                <table class="targetTable">
                    <th> Location </th>
                    <th> Sublocation </th>
                    <th> Description </th>
                    <th> Client ID </th>
                    
                    <?php
                    require "backend/loadClients.php";
                    ?>
                </table> 
            </div>
        </div>

        <?php include "subpages/editClient.php" ?>
    </body>
</html>