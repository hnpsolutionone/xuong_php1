<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$baseUrl = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
require_once 'Model/Database.php';
// khai báo các thông số kết nối
$db_host = "localhost";
$db_name = "php1";
$db_user = "root";
$db_pass = "";

$db = new Database($db_host, $db_name, $db_user, $db_pass);
$db->contect();

// chèn file SiteController.php có class SiteController
require_once 'Controller/AdminController.php';
// khởi tạo đối tượng controller từ lớp SiteController. Đây chính là bộ điều khiển
$controller = new AdminController($baseUrl, $db);

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