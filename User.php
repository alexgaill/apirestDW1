<?php

use \Firebase\JWT\JWT;

require "General.php";

class User extends General{

    protected $table = __CLASS__;

    /**
     * Client connexion
     *
     * @param array $param
     */
    public function connexion($param)
    {
        $statement = ("SELECT * FROM user WHERE email='". $param["email"] ."'");
        $user = $this->db->queryReturn($statement, true);
        if (password_verify($param["password"], $user["password"])) {
            $key = "demo";
            $payload = array(
                "exp" => time() * 600,
                "id" => $user["id"]
            );
            $token = JWT::encode($payload, $key);
            $this->db->sendData("connexion ok", true, $token);
        }
    }

    /**
     * Save client in Db
     *
     * @param array $param
     */
    public function save($param){
        $statement = "INSERT INTO $this->table (email, password) 
                        VALUES (:email, :password)";

        $param["password"] = password_hash($param["password"], PASSWORD_DEFAULT);

        $this->db->prepare($statement, "save", $param);
    }
}