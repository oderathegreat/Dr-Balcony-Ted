
To save the data from your registration form into a database using PHP, you'll need to set up a few things:

Database Connection: Establish a connection to your database.
User Class: Create a class to handle user data.
Form Handling: Process the form submission and save the data using the user class.
Here's how you can do it:

1. Database Connection
Create a separate file, db.php, to handle the database connection.

php
Copy code
<?php
class Database {
    private $host = "localhost";
    private $db_name = "your_database_name";
    private $username = "your_database_username";
    private $password = "your_database_password";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
2. User Class
Create a User.php file to handle user data.

php
Copy code
<?php
class User {
    private $conn;
    private $table_name = "users";

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
3. Form Handling
Modify your registration.php to handle form submissions.

php
Copy code
<?php
require_once 'db.php';
require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->firstName = $_POST['firstName'];
    $user->lastName = $_POST['lastName'];
    $user->phone = $_POST['phone'];
    $user->bio = $_POST['bio'];

    if ($user->create()) {
        echo "<div class='alert alert-success'>User was created.</div>";
    } else {
        echo "<div class='alert alert-danger'>Unable to create user.</div>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1>User Registration</h1>
    <form>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="col">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number (Optional)</label>
        <input type="tel" class="form-control" id="phone" name="phone">
      </div>
      <div class="mb-3">
        <label for="bio" class="form-label">Bio (Optional)</label>
        <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-GJvo0DyAV9u2oLS4NLO5b2mDwPfHQIj1lNIcSKi6xhvqT9JY4JIaMvJdaNB6vtQm" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-tjRVpV4GfNNjv/uRuqs84pNHUm/7TAl1t22NRGrru3GmN7QX5wJw3W/CI8Z1O6wC" crossorigin="anonymous"></script>
</body>
</html>
