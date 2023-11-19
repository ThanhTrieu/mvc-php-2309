<?php
namespace app\controller;

use app\controller\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $this->loadHeaderView(["title" => "About page"]);
        $this->loadView("about/index_view");
        $this->loadFooterView();
    }
}