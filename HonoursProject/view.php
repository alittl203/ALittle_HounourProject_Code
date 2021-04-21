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

// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();

// Check if the ID param in the URL exists
if (!isset($_GET['id'])) {
    exit('No ID specified!');
}
// MySQL query that selects the ticket by the ID column, using the ID GET request variable
$stmt = $pdo->prepare('SELECT * FROM roadmaps WHERE id = ?');
$stmt->execute([ $_GET['id'] ]);
$roadmap = $stmt->fetch(PDO::FETCH_ASSOC);
// Check if roadmap exists
if (!$roadmap) {
    exit('Invalid ticket ID!');
}
?>

<div class="content view">

<h2><?=htmlspecialchars($roadmap['title'], ENT_QUOTES)?> </h2>

<div class="ticket">
    <p class="created"><?=date('F dS, G:ia', strtotime($roadmap['created'] ))?></p>
    <p class="roadmapDescription"><?=nl2br(htmlspecialchars($roadmap['RoadmapDescription'], ENT_QUOTES))?></p>
    <p class="roadmapToUpload">BPMN Diagram: <?=nl2br(htmlspecialchars($roadmap['roadmap'], ENT_QUOTES))?></p>
    <p class="documentationToUpload">Diagram Documentation: <?=nl2br(htmlspecialchars($roadmap['documentation'], ENT_QUOTES))?></p>
</div>
</div>

