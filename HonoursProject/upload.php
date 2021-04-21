<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Global Climate Change Roadmap</title>
            <link href="style.css" rel="stylesheet" type="text/css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Global Climate Change Roadmap</h1>
            </div>
            </nav>
            <nav class="navtop div menu"> 
                <div>
                    <a href="index.php"><i class="fas fa-ticket-alt"></i>Home</a>
                    <a href="roadmap.php"><i class="fas fa-ticket-alt"></i>Roadmaps</a>
                    <a href="logout.php"><i class="fas fa-ticket-alt"></i>Logout</a>
                </div>
        </nav>
 
        </body>
    </html>
<?php

include 'config.php';

session_start();
if (isset($_SESSION['loggedin']) != true) {
    header("Location: login.php");
}


$pdo = pdo_connect_mysql();
// Output message variable
$msg = '';
// Check if POST data exists (user submitted the form)
if (isset($_POST['title'], $_POST['roadmapDescription'], $_POST['roadmapToUpload'], $_POST['documentationToUpload'])) {
    // Validation checks... make sure the POST data is not empty
    if (empty($_POST['title'])  || empty($_POST['roadmapDescription'] ) || empty($_POST['roadmapToUpload'] )|| empty($_POST['documentationToUpload'] )) {
        $msg = 'Please complete the form!';
    } else {
        // Insert new record into the tickets table
        $stmt = $pdo->prepare('INSERT INTO roadmaps (title,  roadmapDescription, roadmap, documentation) VALUES (?, ?, ?, ?)');
        $stmt->execute([ $_POST['title'], $_POST['roadmapDescription'], $_POST['roadmapToUpload'], $_POST['documentationToUpload']]);
        // Redirect to the view ticket page, the user will see their created ticket on this page
        header('Location: view.php?id=' . $pdo->lastInsertId());
    }
}
?>

<div class="content create">
	<h2>Upload new roadmap</h2>
    <form action="upload.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" id="title" required>
        <label for="roadmapDescription">Message</label>
        <textarea name="roadmapDescription" placeholder="Enter your message here..." id="roadmapDescription" required></textarea>
        Select roadmap to upload:
        <input type="file" name="roadmapToUpload" id="roadmapToUpload">
        Select publication to upload:
        <input type="file" name="documentationToUpload" id="documentationToUpload">
        <input type="Submit" value="Upload">
        </form>

    <!-- <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?> -->
</div>

