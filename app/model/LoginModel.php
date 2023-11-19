<?php
namespace app\model;

class LoginModel
{
    public function checkLoginUser($username, $password) : array
    {
        if($username === "admin" && $password === "123"){
            return ["name" => $username];
        }
        return [];
    }
}