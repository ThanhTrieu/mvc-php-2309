<?php
namespace app\model;

use database\Connection;
use PDO;

class LoginModel extends Connection
{
    public function checkLoginUser($username, $password) : array
    {
        $infoUser = [];
        $sql = "SELECT * FROM `users` WHERE (`username` = :user AND `password` = :pass) OR (`email` = :email AND `password` = :myPass)";
        $stmt = $this->db->prepare($sql); // check kiem tra sql
        if($stmt){
            $stmt->bindParam(":user", $username, PDO::PARAM_STR);
            $stmt->bindParam(":pass", $password, PDO::PARAM_STR);
            $stmt->bindParam(":email", $username, PDO::PARAM_STR);
            $stmt->bindParam(":myPass", $password, PDO::PARAM_STR);
            if($stmt->execute()){
                // thuc thi chay sql
                if($stmt->rowCount() > 0){
                    $infoUser = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        $stmt->closeCursor(); // neu con muon xu ly cac lenh sql tiep
        return $infoUser;
    }
}