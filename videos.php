<html lang="en_us">
    <head>
        <title> RemoteAD Videos</title>

        <!-- CSS Page specific -->
        <link rel="stylesheet" type="text/css" href="css/tables.css">
    </head>
    <body>
        <?php include "includes/navbar.php"; ?>
        <div class="container">
            <div class="formHolder">
                <table class="targetTable">
                    <th> Platform </th>
                    <th> Video Key </th>
                    <th> Video Length </th>
                    
                    <?php require "backend/loadVideos.php"; ?>
                </table> 
            </div>
        </div>
    </body>
</html>