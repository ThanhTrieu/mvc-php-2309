<?php
namespace app\controller;

use app\controller\Controller;
use app\model\ProductModel;

class DetailController extends Controller
{
    public function index()
    {
        $id = $_GET['id'] ?? null;
        $id = is_numeric($id) ? $id : 0;
        // $infoPd = lay trong model - tham khao cart controller

        $this->loadHeaderView(["title" => "Detail page"]);
        $this->loadView("detail/index_view");
        $this->loadFooterView();
    }
}