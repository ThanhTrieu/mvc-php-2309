<?php
namespace app\model;

use database\Connection;
use PDO;

class ProductModel extends Connection
{
    public function getAllDataProducts()
    {
       $products = [];
       $sql = "SELECT * FROM products";
       $stmt = $this->db->prepare($sql);
       if($stmt){
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            }
        }
        $stmt->closeCursor();
        return $products;
    }

    public function getDetailProductById($id = 0)
    {
        $infoPd = [];
        $sql = "SELECT * FROM products WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        if($stmt){
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    $infoPd = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        $stmt->closeCursor();
        return $infoPd;
    }

}