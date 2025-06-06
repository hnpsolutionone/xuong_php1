<?php
class Database
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    public $connection;

    public function __construct($db_host, $db_name, $db_user, $db_pass)
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    public function contect()
    {
        try {
            $dsn = "mysql:host=$this->db_host; dbname=$this->db_name;charset=utf8"; // Chuỗi kết connect
            $this->connection = new PDO($dsn, $this->db_user, $this->db_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connection successful!\n";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "\n";
            die();
        }
    }

    public function disconnect() {
        if($this->connection != null) {
            $this->connection = null;
        }
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM `products`";
        $stmt = $this->connection->query($query);
        $products = $stmt->fetchAll();
        return $products;
    }

    public function getProductDetail($id)
    {
        $query = "SELECT * FROM `products` WHERE id = " . $id;
        $stmt = $this->connection->query($query);
        $product = $stmt->fetch();
        return $product;
    }
}