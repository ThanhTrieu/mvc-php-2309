<?php
namespace app\controller;

use app\controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->loadHeaderView(["title" => "Home page"]);
        $this->loadView("home/index_view");
        $this->loadFooterView();
    }
}