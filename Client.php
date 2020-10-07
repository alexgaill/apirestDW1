<?php

require "General.php";
class Client extends General{

    protected $table = __CLASS__;

    public function connexion($param)
    {
        $statement = ("SELECT * FROM client WHERE username='". $param["username"] ."'");
        $user = $this->db->queryReturn($statement, true);
        if (password_verify($param["password"], $user["password"])) {
            $this->db->sendData("connexion ok", true, $user["secret_api_key"]);
        }


    }

    /**
     * Save client in Db
     *
     * @param array $param
     * @return void
     */
    public function save($param){
        $statement = "INSERT INTO $this->table (username, password, secret_api_key) 
                        VALUES (:username, :password, :secret_api_key)";

        $param["password"] = password_hash($param["password"], PASSWORD_DEFAULT);
        $param["secret_api_key"] = md5(uniqid());

        $this->db->prepare($statement, "save", $param);
    }

}