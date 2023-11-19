<?php
if(!defined("APP_PATH")){
    die("Can not access");
}

// day la noi tiep nhan cac request tu phia nguoi dung gui len - (chinh la cac duong link truy cap tren url o trinh duyet cua nguoi dung - method GET)
// index.php?c=home&m=index&id=10
// c: ten cua controller(ten cua 1 file, chinh la ten class)
// m: ten cua phuong thuc nam trong controller
// nhung tham so con lai chi goi la du lieu gui len
$c = ucfirst($_GET['c'] ?? 'home'); // Home
$m = $_GET['m'] ?? 'index';
// quy uoc ten controller : chu cai dau se viet hoa luon co hau to Controller: HomeController.php
$nameController = "{$c}Controller";
$nameFileController = "{$c}Controller.php";
$fullPathFileController = NAME_SPACE_CONTROLLER . $nameFileController;
// app\controller\HomeController.php; 
// app/controller/HomeController.php;
$realFullPathFileController = str_replace("\\","/", $fullPathFileController);
if(file_exists($realFullPathFileController)){
    $controller = NAME_SPACE_CONTROLLER . $nameController;
    $obj = new $controller(); // khoi tao doi tuong cho controller
    $obj->$m(); // goi phuong thuc trong controller de thuc thi
} else {
    exit("Not found Request");
}