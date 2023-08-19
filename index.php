<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./.css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Taeufel Share</title>
</head>
<body>
    <a href='./'>
        <img src='./icon.png' alt='Taeufel Share' width='300' class='icon'>
    </a>
    <div class="video-grid">
    <?php
        $video_files = glob('.videos/*.txt');
        foreach ($video_files as $video_file) {
            $video_id = basename($video_file, '.txt');
            $info_file = ".videos/{$video_id}.txt";

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
                    echo "<div class='thumbnail-container'>";
                    echo "<a href='watch/?v={$video_id}'>";
                    echo "<img class='thumbnail' src='{$thumbnailURL}' alt='{$videoTitle}'>";
                    echo "<div class='thumbnail-title-container'>";
                    echo "<p class='thumbnail-title'>{$videoTitle}</p>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>