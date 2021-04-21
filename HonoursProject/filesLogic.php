<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'HonourProject');


$sql = "SELECT * FROM roadmaps";
$result = mysqli_query($conn, $sql);

$roadmaps = mysqli_fetch_all($result, MYSQLI_ASSOC);



// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $title = $_TITLE['title']['title'];
    $description = $DESCRIPTION['roadmapDescription']['RoadmapDescription'];
    $roadmapFile = $_ROADMAPFILE['roadmap']['roadmap'];
    $documentationFile = $_DOCUMENTAIONFILE['documentation']['documentation'];

    // destination of the fileS on the server
    $destination = 'uploads/' . $roadmapFile;
    $destination = 'uploads/' . $documentationFile;

    // get the file extension
    $extension = pathinfo($roadmapFile, PATHINFO_EXTENSION);
    $extension = pathinfo($roadmapFile, PATHINFO_EXTENSION);


    // the physical file on a temporary uploads directory on the server
    $rfile = $_FILES['myfile']['tmp_name'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'bpm'])) {
        echo "You file extension must be .zip, .pdf or .docx or .bpm";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($roadmpas, $destination)) {
            $sql = "INSERT INTO files (title,  roadmapDescription, roadmap, documentation) VALUES ('$title', $description, $roadmapFile, $documentationFile)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

