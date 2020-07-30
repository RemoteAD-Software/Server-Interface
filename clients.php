<html lang="en_us">
    <head>
        <title> RemoteAD Clients</title>
        <!-- CSS Page specific -->
        <link rel="stylesheet" type="text/css" href="css/tables.css">

    </head>
    <body>

    <?php
        include "includes/navbar.php";
    ?>
        <div class="container">
            <div class="formHolder">
                <table class="targetTable">
                    <th> Client Location </th>
                    <th> Client Sublocation </th>
                    <th> Description </th>
                    <th> Client ID </th>
                    
                    <?php
                    require "backend/loadClients.php";
                    ?>
                </table> 
            </div>
        </div>
    </body>
</html>