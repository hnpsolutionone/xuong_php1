<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$baseUrl = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/';
//var_dump($_SESSION['userInfo']);
require_once 'Model/Database.php';
// khai báo các thông số kết nối
$db_host = "localhost";
$db_name = "php1";
$db_user = "root";
$db_pass = "";

$db = new Database($db_host, $db_name, $db_user, $db_pass);
$db->contect();

// Chèn file SiteController.php có class SiteController
require_once 'Controller/SiteController.php';
// khởi tạo đối tượng controller từ lớp SiteController. Đây chính là bộ điều khiển
$controller = new SiteController($baseUrl, $db);

// Chèn header
include 'Views/header.php';

// chèn các nội dung chính của trang
if (!isset($_GET['page'])) {
  //include 'Views/home.php';
  $controller->index(); // sẽ gọi include 'Views/home.php'; như dòng trên
} else {
  //include 'Views/'. $_GET['page'] .'.php';
  $page = $_GET['page'];
  $controller->$page();
}

// chèn footer
include 'Views/footer.php';