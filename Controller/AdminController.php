<?php
class AdminController {
    public $baseUrl;
    public function __construct($baseUrl) {
        $this->baseUrl = $baseUrl;
    }

    // hàm dashboard sẽ gọi trang dashboard
    public function dashboard() {
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        // sau đó gán data vào tầng View
        include 'Views/admin/dashboard.php';
    }

    // hàm productList sẽ gọi trang sản phẩm
    public function productList() {
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        // sau đó gán data vào tầng View
        include 'Views/admin/productList.php';
    }
}