<?php
namespace app\controller;

use app\controller\Controller;

class CartController extends Controller
{
    public function addCart()
    {
        $this->loadHeaderView(["tile" => "Add Cart"]);
        $this->loadView("cart/index_view");
        $this->loadFooterView();
    }
    
}