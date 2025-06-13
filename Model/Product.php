<?php
class Product
{
    /*
    public $id;
    public $name;
    public $category_id;
    public $description;
    public $image;
    public $price;
    public $sale_price;
    public $quantity;
    public $status;
    */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    /*
    public function __construct($id, $name, $category_id, $description, $image, $sale_price, $quantity, $status, $db)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category_id = $category_id;
        $this->description = $description;
        $this->image = $image;
        $this->sale_price = $sale_price;
        $this->quantity = $quantity;
        $this->status = $status;
        $this->db = $db;
    }
        */

    public function getAllProducts()
    {
        $query = "SELECT * FROM `products`";
        $stmt = $this->db->connection->query($query);
        $products = $stmt->fetchAll();
        return $products;
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM `products` WHERE id = :id";
        $stmt = $this->db->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch();
        return $product;
    }

    public function updateProduct($id, $name, $description, $image, $price, $sale_price, $quantity)
    {
        $query = "UPDATE `products` 
        SET `name` = :name, `description` = :description, `image` = :image, `price` = :price, `sale_price` = :sale_price, `quantity` = :quantity 
        WHERE `id` = :id";
        $stmt = $this->db->connection->prepare($query);

        if ($stmt->execute(['id' => $id, 'name' => $name, 'description' => $description, 'image' => $image, 'price' => $price, 'sale_price' => $sale_price, 'quantity' => $quantity])) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insertProduct($name, $category_id, $description, $image, $price, $sale_price, $quantity)
    {
        $query = "INSERT INTO  `products` (name, category_id, description, image, price, sale_price, quantity)
                    VALUES (:name, :category_id, :description, :image, :price, :sale_price, :quantity)";
        $stmt = $this->db->connection->prepare($query);

        if ($stmt->execute(['name' => $name, 'category_id' => $category_id, 'description' => $description, 'image' => $image, 'price' => $price, 'sale_price' => $sale_price, 'quantity' => $quantity])) {
            return 1;
        } else {
            return 0;
        }
    }
}