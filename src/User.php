<?php
class User {
    private $conn;
    private $table_name = "registration";

    public $username;
    public $email;
    public $password;
    public $firstName;
    public $lastName;
    public $phone;
    public $bio;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
            SET
                username = :username,
                email = :email,
                password = :password,
                firstName = :firstName,
                lastName = :lastName,
                phone = :phone,
                bio = :bio";

        $stmt = $this->conn->prepare($query);

        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=password_hash($this->password, PASSWORD_BCRYPT);
        $this->firstName=htmlspecialchars(strip_tags($this->firstName));
        $this->lastName=htmlspecialchars(strip_tags($this->lastName));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->bio=htmlspecialchars(strip_tags($this->bio));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":firstName", $this->firstName);
        $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":bio", $this->bio);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
