<?php
namespace app\controller;

use app\controller\Controller;
use app\model\ProductModel;

class HomeController extends Controller
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }
    public function index()
    {
        // xu ly logic o day
        $dataProducts = $this->productModel->getAllDataProducts();


        $this->loadHeaderView(["title" => "Home page"]);
        $this->loadView("home/index_view",[
            "products" => $dataProducts // truyen bien ra ngoai view
        ]);
        $this->loadFooterView();
    }
}