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
                    <a href="login.php"><i class="fas fa-ticket-alt"></i>Login</a>
                    <a href="logout.php"><i class="fas fa-ticket-alt"></i>Logout</a>
                </div>
        </nav>
 
        </body>
    </html>
<?php
include 'config.php';

// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();



//MySQL query that retrieves  all the roadmaps from the databse
$stmt = $pdo->prepare('SELECT * FROM roadmaps ORDER BY created DESC');
$stmt->execute();
$roadmaps = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    
<div class="content home">

	<h2>Roadmaps</h2>

	<p>Below you can view the list of roadmaps below.</p>

	<div class="btns">
		<a href="upload.php" class="btn">Upload Roadmap</a>
	</div>

	<div class="roadmaps-list">
		<?php foreach ($roadmaps as $roadmap): ?>
		<a href="view.php?id=<?=$roadmap['id']?>" class="roadmap">
			<span class="con">
				<span class="title" ><?=htmlspecialchars($roadmap['title'], ENT_QUOTES)?></span> - 
			</span>
			<span class="con created"><?=date('F dS, G:ia', strtotime($roadmap['created']))?></span>
		</a>
        </br> </br>
		<?php endforeach; ?>
	</div>

</div>


