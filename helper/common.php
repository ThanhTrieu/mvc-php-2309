<?php

if(!function_exists("redirect_action")){
    function redirect_action($c, $m, $params = []) {
        // $c : ten controller
        // $m : ten method
        // $params : tham so data
        /*
        ['id' => 10, 'name' => 'teo']
        $c = home
        $m = index
        index.php?c=home&m=index&id=10&name=teo
        */
        $strParams = '';
        foreach($params as $k => $v) {
            $strParams .= empty($strParams) ? "{$k}={$v}" : "&{$k}={$v}";
            //&id=10&name=teo
        }
        $linkRedirect = empty($strParams) ? APP_PATH . "?c={$c}&m={$m}" : APP_PATH . "?c={$c}&m={$m}&{$strParams}";
        header("Location:{$linkRedirect}");
    }
}
if(!function_exists("get_session_username")) {
    function get_session_username() {
        $username = $_SESSION["username"] ?? null;
        return $username;
    }
}
if(!function_exists("count_carts")){
    function count_carts() {
        $cart = $_SESSION['cart'] ?? [];
        return count($cart);
    }
}