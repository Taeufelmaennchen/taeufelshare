<?php
$video_id = $_GET['v'];$info_file = "../.videos/{$video_id}.txt";
$info_file = "../.videos/{$video_id}.txt";
$comment_file = "../.videos/{$video_id}.comments";

if (file_exists($info_file)) {
    $video_info = file_get_contents($info_file);
    $video_info = htmlspecialchars($video_info);

    if (preg_match("/Title: (.+)/", $video_info, $videoTitleMatches) &&
        preg_match("/Description: (.+)/", $video_info, $videoDescriptionMatches) &&
        preg_match("/Video URL: (.+)/", $video_info, $videoURLMatches) &&
        preg_match("/Thumbnail URL: (.+)/", $video_info, $thumbnailURLMatches)) {
        $videoTitle = $videoTitleMatches[1];
        $videoDescription = $videoDescriptionMatches[1];
        $videoURL = $videoURLMatches[1];
        $thumbnailURL = $thumbnailURLMatches[1];
        $videoDescription = str_replace('\n', '<br>', $videoDescription);
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='shortcut icon' href='../favicon.ico' type='image/x-icon'>";
        echo "<link rel='stylesheet' href='../.css/watch.css'>";
        echo "<script>";
        echo "const descriptionWidth = document.querySelector('.description').offsetWidth;";
        echo "";
        echo "document.getElementById('video').style.width = `${descriptionWidth}px`;";
        echo "</script>";
        echo "<title>{$videoTitle}</title>";
        echo "</head>";
        echo "<body>";
        echo "<a href='../'>";
        echo "<img src='../icon.png' alt='Taeufel Share' width='300' class='icon'>";
        echo "</a>";
        echo "<div class='video-player'>";
        echo "<div class='video-container'>";
        echo "<div class='video-wrapper'>";
        echo "<video controls poster='{$thumbnailURL}' autoplay>";
        echo "<source src='{$videoURL}' type='video/mp4'>";
        echo "</video>";
        echo "</div>";
        echo "<h2 class='title'>{$videoTitle}</h2>";
        echo "<div class='description-container'>";
        echo "<p class='description'>{$videoDescription}</p>";
        echo "</div>";
        echo "</div>";
        echo "<div class='comments-container'>";
        echo "<h3 class='comments-title'>Comments</h3>";
        echo "<p class='comments'>Random Comment 1</p>";
        echo "<p class='comments'>Random Comment 2</p>";
        echo "<p class='comments'>Random Comment 3</p>";
        echo "<p class='comments'>Random Comment 4</p>";
        echo "<p class='comments'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut diam vel nisl gravida tincidunt. Vivamus luctus quam ut dolor cursus, vel ultricies ipsum congue. Proin eu tortor nec libero blandit bibendum. Fusce vulputate, ligula vel fermentum luctus, libero nisi eleifend est, eget accumsan erat eros at dolor. Nulla facilisi. Sed sollicitudin urna nec libero egestas, id viverra elit vulputate. Sed et enim felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam nec lectus non quam auctor efficitur.</p>";
        echo "<p class='comments'>Random Comment 6</p>";
        echo "<p class='comments'>Random Comment 7</p>";
        echo "<p class='comments'>Random Comment 1</p>";
        echo "<p class='comments'>Random Comment 2</p>";
        echo "<p class='comments'>Random Comment 3</p>";
        echo "<p class='comments'>Random Comment 4</p>";
        echo "<p class='comments'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut diam vel nisl gravida tincidunt. Vivamus luctus quam ut dolor cursus, vel ultricies ipsum congue. Proin eu tortor nec libero blandit bibendum. Fusce vulputate, ligula vel fermentum luctus, libero nisi eleifend est, eget accumsan erat eros at dolor. Nulla facilisi. Sed sollicitudin urna nec libero egestas, id viverra elit vulputate. Sed et enim felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam nec lectus non quam auctor efficitur.</p>";
        echo "<p class='comments'>Random Comment 6</p>";
        echo "<p class='comments'>Random Comment 7</p>";
        echo "<p class='comments'>Random Comment 1</p>";
        echo "<p class='comments'>Random Comment 2</p>";
        echo "<p class='comments'>Random Comment 3</p>";
        echo "<p class='comments'>Random Comment 4</p>";
        echo "<p class='comments'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut diam vel nisl gravida tincidunt. Vivamus luctus quam ut dolor cursus, vel ultricies ipsum congue. Proin eu tortor nec libero blandit bibendum. Fusce vulputate, ligula vel fermentum luctus, libero nisi eleifend est, eget accumsan erat eros at dolor. Nulla facilisi. Sed sollicitudin urna nec libero egestas, id viverra elit vulputate. Sed et enim felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam nec lectus non quam auctor efficitur.</p>";
        echo "<p class='comments'>Random Comment 6</p>";
        echo "<p class='comments'>Random Comment 7</p>";
        echo "</div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='shortcut icon' href='../favicon.ico' type='image/x-icon'>";
        echo "<link rel='stylesheet' href='../.css/watch.css'>";
        echo "<title>Error: Invalid format!</title>";
        echo "</head>";
        echo "<body>";
        echo "<a href='../'>";
        echo "<img src='../icon.png' alt='Taeufel Share' width='300' class='icon'>";
        echo "</a>";
        echo "<h3 class='error'>Invalid information format in the video file!</h3>";
        echo "</body>";
    }
} else {
    echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='shortcut icon' href='../favicon.ico' type='image/x-icon'>";
        echo "<link rel='stylesheet' href='../.css/watch.css'>";
        echo "<title>Error: No video!</title>";
        echo "</head>";
        echo "<body>";
        echo "<a href='../'>";
        echo "<img src='../icon.png' alt='Taeufel Share' width='300' class='icon'>";
        echo "</a>";
        echo "<h3 class='error'>No video associated with that ID found!</h3>";
        echo "</body>";
}
?>