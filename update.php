<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id=$id";
    $result = $conn->query($sql);
    $post = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
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
        <h1>Update Post</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" required>
            <label for="content">Content</label>
            <textarea id="content" name="content" rows="10" required><?php echo $post['content']; ?></textarea>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
