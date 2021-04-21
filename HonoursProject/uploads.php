<?php include 'filesLogic.php';?>
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
  <div class="content create">
        <form action="uploads.php" method="post" enctype="multipart/form-data" >
          <h2>Upload File</h2>
          <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" id="title" required>
            <label for="roadmapDescription">Message</label>
            <textarea name="roadmapDescription" placeholder="Enter your message here..." id="roadmapDescription" required></textarea>
            Select roadmap to upload:
          <input type="file" name="roadmap"> <br>
          Select roadmap to upload:
          <input type="file" name="documentation"> <br>
          <button type="submit" name="save">upload</button>
        </form>
    </div>
  </body>
</html>

