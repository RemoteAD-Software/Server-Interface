<?php
require "dbConnect.php";

$pull_stmt = "SELECT platform,videoKey,length,allowedLocations FROM videoLibrary";

$getVideos = $handle->prepare($pull_stmt);
$getVideos->execute();

$videos = $getVideos->fetchAll();

if(sizeof($videos) === 0) {
    echo "<tr class=\"targetTr\"><td class=\"rightest\"> No Videos found</td></tr>";

} else {

    foreach($videos as $video) {
        $platform = $video['platform'];
        $key = $video['videoKey'];
        $length = $video['length'];
    
        echo
        "<tr class=\"targetTr\">
            <td>${platform}</td>
            <td>${key}</td>
            <td class=\"rightest\">${length} seconds </td>
        </tr>";
    }
}
