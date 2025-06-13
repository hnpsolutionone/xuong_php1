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

    public function createOrder()
    {
        //add vào bảng order
        $orderCode = 'ORDER_' . date('Ymd-His');
        
        $paymentMethod = $_POST['payment_method'];
        
        $sql = "INSERT INTO orders (`user_id`, `order_code`, `receiver_name`, `receiver_address`, `receiver_mobile`, `total_price`, `delivery_date`, `payment_method`, `status`) 
            VALUES (:uid, :order_code, :receiver_name, :receiver_address, :receiver_mobile, :total_price, :delivery_date, :payment_method, 1)";
        
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bindParam(':uid', $_SESSION['userInfo']['userId']);
        $stmt->bindParam(':order_code', $orderCode);
        $stmt->bindParam(':receiver_name', $_POST['receiver_name']);
        $stmt->bindParam(':receiver_address', $_POST['receiver_address']);
        $stmt->bindParam(':receiver_mobile', $_POST['receiver_mobile']);
        $stmt->bindParam(':total_price', $_POST['total_price']);
        @$stmt->bindParam(':delivery_date', date('Ymd'));
        $stmt->bindParam(':payment_method', $paymentMethod);

        $stmt->execute();
        // lấy id đơn vừa mới tạo
        $orderId = $this->db->connection->lastInsertId();

        // tạo các dòng trong bảng orders_detail sau khi tạo xong order
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $item) {
                //add vào bảng orders_detail
                $sql = "INSERT INTO order_details (`order_id`, `product_id`, `quantity`, `price`) 
                    VALUES (:order_id, :product_id, :quantity, :price)";
                $stmt = $this->db->connection->prepare($sql);
                $stmt->bindParam(':order_id', $orderId);
                $stmt->bindParam(':product_id', $id);
                $stmt->bindParam(':quantity', $item['quantity']);
                $stmt->bindParam(':price', $item['price']);
                $stmt->execute();
            }
            // huỷ giỏ hàng
            unset($_SESSION['cart']);
        }
        return ['orderId' => $orderId, 'payment_method' => $paymentMethod, 'amount' => $_POST['total_price']];
    }
}