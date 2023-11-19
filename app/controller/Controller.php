<?php 
namespace app\controller;

class Controller
{
    public function __call($method, $args)
    {
        exit("Request {$method} not found");
    }

    protected function loadHeaderView($header = [])
    {
        $this->loadView("partials/header_view", $header);
    }
    protected function loadFooterView()
    {
        $this->loadView("partials/footer_view");
    }
    protected function loadView($path, $data = [])
    {
        extract($data);
        /*
        ['id' => 10, 'name' => 'teo']
        day ca du lieu mang nay ra view
        $id , $name
        */
        // $path : home/index_view
        require APP_PATH_VIEW.$path.".php";
    }
}