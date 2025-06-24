<?php

namespace classes;

require 'Database.php';
require 'Project.php';


class ProjectManager
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // ici on appelle le constrcteur de la classe Database
    }

    public function getProjects()
    {
        $sql = "SELECT * FROM projets";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->execute();
        $projects = $stmt->fetchAll();

        foreach ($projects as $project) {
            if (!empty($project['categories'])) {
                $project['categories'] = explode(',', $project['categories']);
            }
        }

        return $projects;
    }

    public function getProject($id)
    {
        $sql = "SELECT * FROM projets WHERE id = :id";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $project = $stmt->fetch();

        //explode categories into an array if not empty
        if ($project && !empty($project['categories'])) {
            $project['categories'] = explode(',', $project['categories']);
        }
        return $project;
    }

    public function addProject(Project $project)
    {
        $project->validate();
        if (empty($project->getName()) || empty($project->getStatus())) {
            throw new Exception("Name and status are required.");
        }

        $sql = "INSERT INTO projets (name, description, status, priority, categories) VALUES (:name, :description, :status, :priority, :categories)";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindValue(':name', $project->getName());
        $stmt->bindValue(':description', $project->getDescription());
        $stmt->bindValue(':status', $project->getStatus());
        $stmt->bindValue(':priority', $project->getPriority());
        // Convert categories array to a comma-separated string
        $stmt->bindValue(':categories', implode(',', $project->getCategories()));
        return $stmt->execute();
    }

    public function updateProject(Project $project, $id)
    {
        $project->validate();
        if (empty($project->getName()) || empty($project->getStatus())) {
            throw new Exception("Name and status are required.");
        }

        $sql = "UPDATE projets SET name = :name, description = :description, status = :status, priority = :priority, categories = :categories WHERE id = :id";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindValue(':name', $project->getName());
        $stmt->bindValue(':description', $project->getDescription());
        $stmt->bindValue(':status', $project->getStatus());
        $stmt->bindValue(':priority', $project->getPriority());
        $stmt->bindValue(':categories', implode(',', $project->getCategories()));
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function deleteProject($id)
    {
        $sql = "DELETE FROM projets WHERE id = :id";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
