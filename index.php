<?php
// file root - chay ung dung
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once __DIR__ . "/vendor/autoload.php";

if(file_exists(__DIR__ . "/route/web.php")){
    require __DIR__ . "/route/web.php";
} else {
    echo "website dang bao tri , vui long quay lai sau";
}