<?php
namespace app\controller;

use app\controller\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->loadView9("login/index_view");
    }
    
}