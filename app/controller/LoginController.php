<?php
namespace app\controller;

use app\controller\Controller;
use app\model\LoginModel;

class LoginController extends Controller
{
    private $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    public function index()
    {
        $this->loadView("login/index_view",["title" => "login"]);
    }

    public function logout()
    {
        if(!empty(get_session_username())){
            unset($_SESSION["username"]);
        }
        redirect_action("home","index");
    }

    public function handle()
    {
        if(isset($_POST["username"])){
            $username = $_POST["username"] ?? null;
            $username = strip_tags($username);
            $password = $_POST["password"] ?? null;
            $password = strip_tags($password);

            if(empty($username) || empty($password)){
                redirect_action("login","index",["state"=>"error"]);
            } else {
                $infoUser = $this->loginModel->checkLoginUser($username, $password);
                if(empty($infoUser)){
                    redirect_action("login","index",["state"=> "fail"]);
                } else {
                    // luu vao session
                    $_SESSION["username"] = $infoUser["username"];
                    $_SESSION['idUser']   = $infoUser['id'];
                    $_SESSION['emailUser']   = $infoUser['email'];
                    redirect_action("home","index");
                }
            }
        }
    }
    
}