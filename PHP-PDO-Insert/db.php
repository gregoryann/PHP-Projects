
<?php 

class DB {
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "test";
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);

            // echo "Database connected";
        } catch(PDOException $e) {
            die("Connection failed");
        }
    }

    public function insertData($name, $email) {
        $sql = "INSERT INTO userdetails (name, email) VALUES (:name, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email]) or die(print_r($stmt->errorInfo(), true));;
        echo "data inserted";
    }
}
