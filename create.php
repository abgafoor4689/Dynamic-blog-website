<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Blog</a></h1>
            <ul>
                <li><a href="index.php">All Posts</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <h1>Create Post</h1>
        <form action="create.php" method="POST">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content</label>
            <textarea id="content" name="content" rows="10" required></textarea>
            <input type="submit" value="Create">
        </form>
    </div>
</body>
</html>
