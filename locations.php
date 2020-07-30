<html lang="en_us">
    <head>
        <title> RemoteAD - Locations </title>
        <!-- CSS Page specific -->
        <link rel="stylesheet" type="text/css" href="css/tables.css">
        <link rel="stylesheet" type="text/css" href="css/loadlocations.css">

        <!-- Page specific scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/locationsButton.js"></script>
        <script src="js/editLocationPopup.js"></script>

    </head>
    <body>
        <?php include "includes/navbar.php"; ?>

        <div class="container">
            <div class="formHolder">
                <table class="targetTable">
                    <th> Location Name</th>
                    <th> City</th>
                    <th> Street </th>
                    <th> Number </th>
                    <th> ZIP/Postal</th>
                    <th> Country </th>
                    <th> Description </th>
                    <th> Location ID </th>

                    <?php require "backend/loadLocations.php"; ?> 
                </table>
            </div>
        </div>

        <?php include "subpages/editLocation.php" ?>
    </body>
</html>