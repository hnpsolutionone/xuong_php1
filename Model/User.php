<?php
class User {
    public $username;
    public $password;
    public $fullname;
    public $image;
    public $birthday;
    public $email;
    public $mobile;
    public $address;
    public $role;
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser() {
        $sql = "INSERT INTO users (username, password, fullname, image, birthday, email, mobile, address, role)
                VALUES (:username, :password, :fullname, :image, :birthday, :email, :mobile, :address, :role)";

        // $this->db->connection chính là PDO
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bindParam(':username', $this->username);
        // PASSWORD_BCRYPT chỉ định rằng bạn muốn dùng thuật toán bcrypt để mã hóa.
        $stmt->bindParam(':password', password_hash($this->password, PASSWORD_BCRYPT));
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':birthday', $this->birthday);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':mobile', $this->mobile);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':role', $this->role);

        return $stmt->execute();
    }

    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->db->connection->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user) {
            /*
            Kiểm tra xem mật khẩu người dùng nhập có đúng với mật khẩu đã mã hóa (hash) lưu trong database hay không.
            $password: mật khẩu người dùng nhập 
            $user['password']: là chuỗi mật khẩu đã được mã hóa trước đó (password_hash())
            */
            if (password_verify($password, $user['password'])) {
                return $user; // Đăng nhập thành công
            }
        }
        return false; // Sai username hoặc password
    }
}