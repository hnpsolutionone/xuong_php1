<?php
class Cart
{
    public $id;
    public $name;
    public $image;
    public $price;
    public $quantity;
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addToCart()
    {
        if (isset($_POST['addToCart']) && ($_POST['addToCart'])) {
            //lấy giá trị
            $name = $_POST['name'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $id = $_POST['id'];
            $quantity = $_POST['quantity'];

            //add vào giỏ hàng 
            // nếu giỏ hàng chưa có sản phẩm thì khởi tạo session giỏ hàng với mảng rỗng
            if (!isset($_SESSION['cart']))
                $_SESSION['cart'] = [];

            if (isset($_SESSION['cart'][$id])) { // nếu id sản phẩm có trong giỏ hàng thì cộng dồn số lượng
                $_SESSION['cart'][$id]['quantity'] += $quantity;
            } else {
                $_SESSION['cart'][$id] = [
                    "name" => $name,
                    "image" => $image,
                    "price" => $price,
                    "quantity" => $quantity
                ];
            }
        }
    }

    public function deleteItem($id)
    {
        //xoá 1 sản phẩm trong giỏ hàng
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }
}