<?php
namespace app\model;

use database\Connection;
use PDO;

class LoginModel extends Connection
{
    public function insertUser(
        $firstName,
        $lastName,
        $username,
        $password,
        $email,
        $phone,
        $gender,
        $address,
        $birthday,
        $avatar
    ) : bool
    {
        $roleId = ROLE_USER_ID;
        $status = STATUS_ACTIVE_USER;
        $createdAt = date('Y-m-d H:i:s');
        $lastLogin = null;
        $lastLogout = null;
        $ipClient = null;
        $updatedAt = null;
        $deletedAt = null;

        $checkInsert = false;
        $sql = "INSERT INTO `users`(`role_id`,`username`,`password`,`email`,`phone`,`gender`,`address`,`birthday`,`first_name`,`last_name`,`status`,`avatar`,`last_login`,`last_logout`,`ip_client`,`created_at`,`updated_at`,`deleted_at`) VALUES(:role_id, :username, :pass, :email, :phone, :gender, :addr, :birthday, :first_name, :last_name, :my_status, :avatar, :last_login, :last_logout, :ip_client, :created_at, :updated_at, :deleted_at)";
        $stmt = $this->db->prepare($sql);
        if($stmt){
            $stmt->bindParam(":role_id",$roleId, PDO::PARAM_INT);
            $stmt->bindParam(":username",$username, PDO::PARAM_STR);
            $stmt->bindParam(":pass",$password, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
            $stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
            $stmt->bindParam(":addr", $address, PDO::PARAM_STR);
            $stmt->bindParam(":birthday", $birthday, PDO::PARAM_STR);
            $stmt->bindParam(":first_name", $firstName, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $lastName, PDO::PARAM_STR);
            $stmt->bindParam(":my_status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":avatar", $avatar, PDO::PARAM_STR);
            $stmt->bindParam(":last_login", $lastLogin, PDO::PARAM_STR);
            $stmt->bindParam(":last_logout", $lastLogout, PDO::PARAM_STR);
            $stmt->bindParam(":ip_client", $ipClient, PDO::PARAM_STR);
            $stmt->bindParam(":created_at", $createdAt, PDO::PARAM_STR);
            $stmt->bindParam(":updated_at", $updatedAt, PDO::PARAM_STR);
            $stmt->bindParam(":deleted_at", $deletedAt, PDO::PARAM_STR);
            if($stmt->execute()){
                $checkInsert = true;
            }
        }
        $stmt->closeCursor();
        return $checkInsert;
    }
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