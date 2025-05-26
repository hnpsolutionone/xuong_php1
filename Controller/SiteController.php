<?php
class SiteController {
    public $baseUrl;
    public $db;
    public function __construct($baseUrl, $db) {
        $this->baseUrl = $baseUrl;
        $this->db = $db;
    }

    // hàm index sẽ gọi trang chủ
    public function index() {
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        $products = $this->db->getAllProducts();
        // sau đó gán data vào tầng View
        include 'Views/home.php';
    }

    // hàm index sẽ gọi trang sản phẩm
    public function product() {
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        $products = $this->db->getAllProducts();
        // sau đó gán data vào tầng View
        include 'Views/product.php';
    }

    // hàm index sẽ gọi trang sản phẩm
    public function productDetail() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        $product = $this->db->getProductDetail($id);
        // sau đó gán data vào tầng View
        include 'Views/product_detail.php';
    }
}