<?php

require_once __DIR__ . '/../Core/Database.php';

class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
}