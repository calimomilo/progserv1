<?php

namespace classes;
class Project
{
    private $id;
    private $name;
    private $description;
    private $status;
    private $priority;
    private $categories;

    const MIN_NAME_LENGTH = 2;
    const MAX_NAME_LENGTH = 100;
    const MIN_DESCRIPTION_LENGTH = 10;
    const MAX_DESCRIPTION_LENGTH = 500;
    const VALID_STATUSES = ['En cours', 'Terminé', 'Annulé'];
    const VALID_PRIORITIES = ['Basse', 'Moyenne', 'Haute'];
    const VALID_CATEGORIES = ['Développement', 'Finances', 'Administration', 'Marketing'];


    public function __construct($name, $description, $status, $priority, $categories)
    {
        $this->name = $name;
        $this->description = $description;
        $this->status = $status;
        $this->priority = $priority;
        $this->categories = $categories;
    }

    public function validate()
    {
        $errors = [];

        if (strlen($this->name) < self::MIN_NAME_LENGTH || strlen($this->name) > self::MAX_NAME_LENGTH) {
            array_push($errors, "min length has to be over " . self::MIN_NAME_LENGTH . " and under " . self::MAX_NAME_LENGTH . " characters");
        }

        if (strlen($this->description) < self::MIN_DESCRIPTION_LENGTH || strlen($this->description) > self::MAX_DESCRIPTION_LENGTH) {
            array_push($errors, "min length has to be over " . self::MIN_DESCRIPTION_LENGTH . " and under " . self::MAX_DESCRIPTION_LENGTH . " characters");
        }

        if (!in_array($this->status, self::VALID_STATUSES)) {
            array_push($errors, "status must be one of the following: " . implode(", ", self::VALID_STATUSES));
        }

        if (!in_array($this->priority, self::VALID_PRIORITIES)) {
            array_push($errors, "priority must be one of the following: " . implode(", ", self::VALID_PRIORITIES));
        }

        // FIXED: Validate each category
        foreach ($this->categories as $cat) {
            if (!in_array($cat, self::VALID_CATEGORIES)) {
                array_push($errors, "categories must be one of the following: " . implode(", ", self::VALID_CATEGORIES));
                break;
            }
        }

        return $errors;
    }


    //Getters
    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function getId()
    {
        return $this->id;
    }

    //Setters
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
}
