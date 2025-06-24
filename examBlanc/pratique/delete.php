<?php

use classes\ProjectManager;

require './classes/ProjectManager.php';

// Check if project ID is provided in URL
if (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    $projectManager = new ProjectManager();
    $project = $projectManager->getProject($projectId);

    if ($project) {
        // Attempt to delete the project
        $deleted = $projectManager->deleteProject($projectId);
        if ($deleted) {
            header("Location: index.php?message=Project deleted successfully");
            exit();
        } else {
            echo "Error deleting project.";
        }
    } else {
        echo "Project not found.";
    }
} else {
    echo "No project ID provided.";
}
