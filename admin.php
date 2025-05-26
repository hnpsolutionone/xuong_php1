<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$baseUrl = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';


// chèn file SiteController.php có class SiteController
require_once 'Controller/AdminController.php';
// khởi tạo đối tượng controller từ lớp SiteController. Đây chính là bộ điều khiển
$controller = new AdminController($baseUrl);

// chèn header
include 'Views/admin/header.php';

// chèn các nội dung chính của trang
if(!isset($_GET['page'])) {
    $controller->dashboard(); // sẽ gọi include 'Views/home.php'; như dòng trên
} else {
  //include 'Views/admin/'. $_GET['page'] .'.php';
  $page = $_GET['page'];
  $controller->$page();
}

// chèn footer
include 'Views/admin/footer.php';