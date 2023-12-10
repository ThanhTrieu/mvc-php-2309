<?php
namespace app\controller;

use app\controller\Controller;
use app\model\LoginModel;

class RegisterController extends Controller
{
    private $loginModel;
    private $allowTypeFile = ['image/jpeg','image/jpg','image/png'];
    private $allowSizeFile = 1024*1024*5; // kb

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        $this->loadView('register/index_view',['title' => 'Register page']);
    }

    private function checkTypeFileAvatar($file)
    {
        // png;jpg;jpeg
        if(in_array($file, $this->allowTypeFile)){
            return true;
        }
        return false;
    }

    private function checkSizeFileAvatar($size)
    {
        // 5Mb
        if($size <= $this->allowSizeFile){
            return true;
        }
        return false;
    }

    public function handle()
    {
        if(isset($_POST['btnRegister'])){
            $firstName = trim($_POST['first_name'] ?? null);
            $firstName = strip_tags($firstName);

            $lastName = trim($_POST['last_name'] ?? null);
            $lastName = strip_tags($lastName);

            $username = trim($_POST['username'] ?? null);
            $username = strip_tags($username);

            $password = trim($_POST['password'] ?? null);
            $password = strip_tags($password);

            $email = trim($_POST['email'] ?? null);
            $email = strip_tags($email);

            $phone = trim($_POST['phone'] ?? null);
            $phone = strip_tags($phone);

            $gender = trim($_POST['gender'] ?? null);
            $gender = strip_tags($gender);

            $address = trim($_POST['address'] ?? null);
            $address = strip_tags($address);

            $birthday = trim($_POST['birthday'] ?? null);
            $birthday = strip_tags($birthday);
            $birthday = $birthday !== null ? date("Y-m-d", strtotime($birthday)) : $birthday; // mysql : Y-m-d
            // strtotime : doi ngay thang ra so giay tinh tu 00:00:00 1/1/1970

            // neu co upload file
            $fileName = null;
            if(!empty($_FILES['avatar'])){
                // nguoi dung co upload file
                // chi can lay ten file cua nguoi dung upload len
                $name = $_FILES['avatar']['name'];
                $name = time().'-'.$name;
                $type = $_FILES['avatar']['type'];
                $size = $_FILES['avatar']['size'];
                $tmpName = $_FILES['avatar']['tmp_name'];

                if($_FILES['avatar']['error'] == 0){
                    if($this->checkSizeFileAvatar($size) && $this->checkTypeFileAvatar($type)){
                        if(move_uploaded_file($tmpName, APP_PATH_PUBLIC . APP_PATH_IMG_UPLOAD.$name)){
                            $fileName = $name;
                            if(!empty($_SESSION['err_register']['avatar'])){
                                unset($_SESSION['err_register']['avatar']);
                            }
                        } else {
                            $_SESSION['err_register']['avatar'] = 'can not upload file';
                        } 
                    } else {
                        $_SESSION['err_register']['avatar'] = 'avatar type format is .png,.jpg..jpeg';
                    }
                } else {
                    $_SESSION['err_register']['avatar'] = 'file is error, can not upload';
                }
            } else {
                if(!empty($_SESSION['err_register']['avatar'])){
                    unset($_SESSION['err_register']['avatar']);
                }
            }
            
            // validate information
            if(empty($firstName)){
                $_SESSION['err_register']['first_name'] = "First name is not empty";
            } else {
                if(!empty($_SESSION['err_register']['first_name'])){
                    unset($_SESSION['err_register']['first_name']);
                }
            }
            if(empty($lastName)){
                $_SESSION['err_register']['last_name'] = 'Last name is not empty';
            } else {
                if(!empty($_SESSION['err_register']['last_name'])){
                    unset($_SESSION['err_register']['last_name']);
                }
            }
            if(empty($username)){
                $_SESSION['err_register']['user_name'] = 'Username is not empty';
            } else {
                if(!empty($_SESSION['err_register']['user_name'])){
                    unset($_SESSION['err_register']['user_name']);
                }
            }
            if(empty($password)){
                $_SESSION['err_register']['password'] = 'Password is not empty';
            } else {
                if(!empty($_SESSION['err_register']['password'])){
                    unset($_SESSION['err_register']['password']);
                }
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['err_register']['email'] = 'Email is invalid';
            } else {
                if(!empty($_SESSION['err_register']['email'])){
                    unset($_SESSION['err_register']['email']);
                }
            }
            if(empty($phone)){
                $_SESSION['err_register']['phone'] = 'Phone is not empty';
            } else {
                if(!empty($_SESSION['err_register']['phone'])){
                    unset($_SESSION['err_register']['phone']);
                }
            }
            // validate done
            if(!isset($_SESSION['err_register']) || empty($_SESSION['err_register'])){
                // nguoi dung da nhap day du cac thong tin bat buoc
                $insert = $this->loginModel->insertUser($firstName, $lastName,$username, $password, $email, $phone, $gender, $address, $birthday, $fileName);
                if($insert){
                    redirect_action("login", "index");
                } else {
                    redirect_action("register", "index", ["state" => "error"]);
                }
            } else {
                redirect_action("register", "index", ["state" => "failure"]);
            }
        }
    }
}