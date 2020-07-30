<html lang="en_us">
    <head>
        <title> RemoteAD Statistics</title>

        <!-- CSS Page specific -->
        <link rel="stylesheet" type="text/css" href="css/tables.css">

    </head>
    <body>
        <?php include "includes/navbar.php"; ?>
        <div class="container">
            <div class="formHolder">
                <table class="targetTable">
                    <th> Video Key </th>
                    <th> Times played </th>
            
                    <?php require "backend/loadStatistics.php"; ?>
                </table>
            </div>
        </div>
    </body>
</html>