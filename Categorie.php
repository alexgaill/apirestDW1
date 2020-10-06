<?php

require "Database.php";

class Categorie {

    /**
     * Db connexion
     *
     * @var Database
     */
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get all informations from Db
     *
     */
    public function getAll()
    {
        $this->db->query("SELECT * FROM categorie");
    }

    /**
     * Gat information from Db
     *
     * @param int $id
     */
    public function getOne($id)
    {
        $this->db->query(
            "SELECT * FROM categorie 
            WHERE id = " . $id, true);
    }

    /**
     * Save new categorie in Db
     *
     * @param array $param
     */
    public function save($param)
    {
        $statement = "INSERT INTO categorie (name) VALUES (:name)";
        $this->db->prepare($statement, "save", $param);
    }

    /**
     * Delete a categorie line in Db
     *
     * @param int $id
     */
    public function delete($id)
    {
        $statement = "DELETE FROM categorie where id=".$id;
        $this->db->prepare($statement, "delete");
    }
    
    /**
     * Modify a category line in Db
     *
     * @param int $id
     * @param array $param
     */
    public function put($id, $param)
    {
        $statement = "UPDATE FROM categorie SET (name = :name) WHERE id=".$id;
        $this->db->prepare($statement, "put", $param);
        
    }
}