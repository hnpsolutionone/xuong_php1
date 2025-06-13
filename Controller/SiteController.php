<?php
require "Model/User.php";
require "Model/Cart.php";
class SiteController
{
    public $baseUrl;
    public $db;
    public function __construct($baseUrl, $db)
    {
        $this->baseUrl = $baseUrl;
        $this->db = $db;
    }

    // hàm index sẽ gọi trang chủ
    public function index()
    {
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        $products = $this->db->getAllProducts();
        // sau đó gán data vào tầng View
        include 'Views/home.php';
    }

    public function cart()
    {
        $baseUrl = $this->baseUrl;
        $cart = new Cart($this->db);
        $cart->addToCart();
        //var_dump($_SESSION['cart']);
        // sau đó gán data vào tầng View
        include 'Views/cart.php';
    }

    public function checkout()
    {
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])) {
            $baseUrl = $this->baseUrl;
            // sau đó gán data vào tầng View
            include 'Views/checkout.php';
        } else {
            header("Location: index.php");
            exit;
        }
    }

    public function payment()
    {
        $baseUrl = $this->baseUrl;
        $cart = new Cart($this->db);
        $result = $cart->createOrder();

        if ($result['payment_method'] == 'VNPay') {
            require_once("./config.php");

            $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = $result['amount'] * 100; // Số tiền thanh toán
            $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
            $vnp_BankCode = ''; //Mã phương thức thanh toán
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount * 100,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => "Thanh toan GD: " . $vnp_TxnRef,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $expire
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            //echo $vnp_Url;exit;
            header('Location: ' . $vnp_Url);
            //exit;
        } else {
            header("Location: index.php");
            exit;
        }

    }

    public function payment_return()
    {
        require_once("./config.php");

        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $info = '';
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                $info = "<span style='color:blue'>Giao dịch thành công</span>";
            } else {
                $info = "<span style='color:red'>Giao dịch không thành công</span>";
            }
        } else {
            $info = "<span style='color:red'>Chữ ký không hợp lệ</span>";
        }
        include 'Views/thankyou.php';
    }

    public function removeItemCart()
    {
        $id = $_GET['id'] ?? 0;
        $cart = new Cart($this->db);
        $cart->deleteItem($id);
        header("Location: index.php?page=cart");
        exit;
    }

    // hàm index sẽ gọi trang sản phẩm
    public function product()
    {
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        $products = $this->db->getAllProducts();
        // sau đó gán data vào tầng View
        include 'Views/product.php';
    }

    // hàm index sẽ gọi trang sản phẩm
    public function productDetail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $baseUrl = $this->baseUrl;
        // có thể gọi model để lấy data nếu có
        $product = $this->db->getProductDetail($id);
        // sau đó gán data vào tầng View
        include 'Views/product_detail.php';
    }

    public function login()
    {
        $baseUrl = $this->baseUrl;
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $error = "Dữ liệu không được phép rỗng";
            } else {
                $user = new User($this->db);
                if ($userInfo = $user->login($username, $password)) {
                    $_SESSION['userInfo'] = ['userId' => $userInfo['id'], 'username' => $userInfo['username'], 'fullname' => $userInfo['fullname'], 'address' => $userInfo['address'], 'mobile' => $userInfo['mobile'], 'email' => $userInfo['email'], 'role' => $userInfo['role']];
                    header("Location: index.php");
                    exit;
                } else {
                    $error = 'Tên đăng nhập hoặc tài khoản không đúng.';
                }
            }
        }
        include 'Views/login.php';
    }

    public function register()
    {
        $baseUrl = $this->baseUrl;
        $errorReg = "";
        $success = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'];
            $rePassword = $_POST['rePassword'];

            if ($password != $rePassword) {
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

    public function logout()
    {
        unset($_SESSION['userInfo']);
        header("Location: index.php");
        exit;
    }
}