<?php
require "Model/Product.php";
class AdminController {
    public $baseUrl;
    public $db;
    public function __construct($baseUrl, $db) {
        $this->baseUrl = $baseUrl;
        $this->db = $db;
    }

    // hàm dashboard sẽ gọi trang dashboard
    public function dashboard() {
        if ($_SESSION['userInfo']['role'] != 'admin') {
            header("Location: index.php");
            exit;
        }
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        // sau đó gán data vào tầng View
        include 'Views/admin/dashboard.php';
    }

    // hàm productList sẽ gọi trang sản phẩm
    public function product_list() {
        if ($_SESSION['userInfo']['role'] != 'admin') header("Location: index.php");
        
        $baseUrl = $this->baseUrl;
        $productModel = new Product($this->db);
        // có thể gọi model để lấy data nếu có
        $products = $productModel->getAllProducts();
        // sau đó gán data vào tầng View
        include 'Views/admin/product_list.php';
    }

    public function product_edit() {
        if($_POST) {
            $product = new Product($this->db);
            if($product->updateProduct($_POST['id'], $_POST['name'], $_POST['description'], $_POST['image'], $_POST['price'], $_POST['sale_price'], $_POST['quantity'])) {
                echo "Cập nhật sản phẩm thành công";
            } else {
                echo "Cập nhật sản phẩm không thành công";
            }
        }
        
        $baseUrl = $this->baseUrl;
        // nạp form để chỉnh sửa product
        // lấy thông tin của product theo id từ URL
        $id = $_GET['id'];

        // lấy thông tin sản phẩm từ model product
        $productModel = new Product($this->db);
        $product = $productModel->getProductById($id);
        
        include 'Views/Admin/product_edit.php';
    }

    public function create_product() {
        if($_POST) {
            $product = new Product($this->db);
            if($product->insertProduct($_POST['name'], $_POST['category_id'], $_POST['description'], $_POST['image'], $_POST['price'], $_POST['sale_price'], $_POST['quantity'])) {
                echo "Thêm sản phẩm thành công";
            } else {
                echo "Thêm sản phẩm không thành công";
            }
        }
        
        $baseUrl = $this->baseUrl;
        // nạp form để chỉnh thêm product
        include 'Views/Admin/create_product.php';
    }

    public function delete() {
        // sau khi delete thì redirect tới admin
        //header("Location: admin.php"); exit;
    }
}