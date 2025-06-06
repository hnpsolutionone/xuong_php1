<?php
require "Model/User.php";
require "Model/Cart.php";
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

    public function cart() {
        $baseUrl = $this->baseUrl;
        $cart = new Cart($this->db);
        $cart->addToCart();
        //var_dump($_SESSION['cart']);
        // sau đó gán data vào tầng View
        include 'Views/cart.php';
    }

    public function removeItemCart() {
        $id = $_GET['id'] ?? 0;
        $cart = new Cart($this->db);
        $cart->deleteItem($id);
        header("Location: index.php?page=cart");
        exit;
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

    public function login() {
        $baseUrl = $this->baseUrl;
        $error = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $error = "Dữ liệu không được phép rỗng";
            } else {
                $user = new User($this->db);
                if ($userInfo = $user->login($username, $password)) {
                    $_SESSION['userInfo'] = ['username' => $userInfo['username'], 'fullname' => $userInfo['fullname']];
                    header("Location: index.php");
                    exit;
                } else {
                    $error = 'Tên đăng nhập hoặc tài khoản không đúng.';
                }
            }
        }
        include 'Views/login.php';
    }

    public function register() {
        $baseUrl = $this->baseUrl;
        $errorReg = "";
        $success = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'];
            $rePassword = $_POST['rePassword'];

            if($password != $rePassword) {
                $errorReg = "Mật khẩu không khớp.";
            } else {
                $user = new User($this->db);
                $user->username = $username;
                $user->fullname = $fullname;
                $user->email = $email;
                $user->password = $password;
                $user->role = 'user';

                if ($user->createUser()) {
                    $success = 'Tạo tài khoản thành công! Bạn có thể đăng nhập.';
                } else {
                    $errorReg = 'Lỗi khi tạo tài khoản.';
                }
            }
        }
        
        include 'Views/login.php';
    }

    public function logout() {
        unset($_SESSION['userInfo']);
        header("Location: index.php");
        exit;
    }
}