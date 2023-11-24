<?php
namespace app\controller;

use app\controller\Controller;
use app\model\ProductModel;

class CartController extends Controller
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $cart = $_SESSION['cart'] ?? null;

        $this->loadHeaderView(["tile" => "Shopping Cart"]);
        $this->loadView("cart/index_view",['carts' => $cart]);
        $this->loadFooterView();
    }

    public function remove()
    {
        if(isset($_POST['btnRemoveAllCart'])){
            if(isset($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
            redirect_action("cart","index");
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        $id = is_numeric($id) ? $id : 0;
        if(!empty($_SESSION['cart'][$id])){
            unset($_SESSION['cart'][$id]);
        }
        redirect_action("cart","index");
    }

    public function update()
    {
        $id = $_GET['id'] ?? null;
        $id = is_numeric($id) ? $id : 0;
        
        $qty = $_POST['qty'] ?? null;
        $qty = (is_numeric($qty) && $qty <= 10 && $qty > 0) ? $qty : 1;
        if(!empty($_SESSION['cart'][$id])){
            // tim dc dung san pham ma nguoi dung muon thay doi so luong mua trong gio hang
            $_SESSION['cart'][$id]['qty'] = $qty;
        }
        redirect_action("cart","index");
    }
    public function addCart()
    {
        // xu ly logic
        $id = $_GET['id'] ?? null;
        $id = is_numeric($id) ? $id : 0;
        // lay thong tin chi tiet san pham theo id
        $info = $this->productModel->getDetailProductById($id);
        if(!empty($info)){
            // kiem tra gio hang co ton tai ko ?
            if(isset($_SESSION['cart'])){
                // san pham them vao gio hang da co hay chua?
                // neu da co thi chi cap so luong mua khong them moi san pham vao gio hang
                // nguoc lai them moi san pham vao gio hang
                if(!empty($_SESSION['cart'][$id])){
                    $_SESSION['cart'][$id]['qty'] += 1;
                } else {
                    $_SESSION['cart'][$id]['id'] = $id;
                    $_SESSION['cart'][$id]['name'] = $info['name'];
                    $_SESSION['cart'][$id]['image'] = $info['image'];
                    $_SESSION['cart'][$id]['price'] = $info['price'];
                    $_SESSION['cart'][$id]['qty'] = 1;
                }
            } else {
                // tao gio hang
                // cac thong tin can luu vao gio hang
                // id - san pham
                // ten san pham
                // anh san pham
                // so luong mua
                // don gia san pham
                // tien = so luong * don gia
                $_SESSION['cart'][$id]['id'] = $id;
                $_SESSION['cart'][$id]['name'] = $info['name'];
                $_SESSION['cart'][$id]['image'] = $info['image'];
                $_SESSION['cart'][$id]['price'] = $info['price'];
                $_SESSION['cart'][$id]['qty'] = 1;
                /*
                [1] => [
                    'id' => 1
                ],
                [2] => [
                    'id' => 2
                ]
                */
            }
        }
        redirect_action("cart","index");
    }
}