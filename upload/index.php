<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Video Upload</title>
</head>
<body>
    <h1>Upload Video</h1>
    <form action="" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br><br>
        
        <label for="video_url">Video URL (MP4):</label>
        <input type="url" name="video_url" placeholder="https://example.com/video.mp4" required><br><br>
        
        <label for="thumbnail_url">Thumbnail URL (1920x1080, JPG/PNG):</label>
        <input type="url" name="thumbnail_url" placeholder="https://example.com/thumbnail.jpg"><br><br>
        
        <input type="submit" value="Upload">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = isset($_POST['title']) ? $_POST['title'] : "";
        $description = isset($_POST['description']) ? $_POST['description'] : "";
        $video_url = isset($_POST['video_url']) ? $_POST['video_url'] : "";
        $thumbnail_url = isset($_POST['thumbnail_url']) ? $_POST['thumbnail_url'] : "";
        
        if (!empty($title) && !empty($description) && !empty($video_url)) {
            $description = str_replace(PHP_EOL, '\n', $description);
            $video_id = uniqid();
            
            $video_extension = "mp4";
            $video_filename = ".videos/{$video_id}.{$video_extension}";
            $info_filename = ".videos/{$video_id}.txt";
            $comment_filename = ".videos/{$video_id}.comments";
            
            file_put_contents("../{$comment_filename}", "");
            
            $info_content = "Title: {$title}\nDescription: {$description}\nVideo URL: {$video_url}\nThumbnail URL: {$thumbnail_url}";
            file_put_contents("../{$info_filename}", $info_content);
            
            if (empty($thumbnail_url)) {
                $im = imagecreatetruecolor(1920, 1080);
                $white = imagecolorallocate($im, 255, 255, 255);
                imagefill($im, 0, 0, $white);
                imagejpeg($im, "../.videos/{$video_id}.jpg");
                imagedestroy($im);
            }
            
            echo "<p>Video uploaded successfully!</p>";
        } else {
            echo "<p>Please fill in all required fields.</p>";
        }
    }
    ?>
</body>
</html>