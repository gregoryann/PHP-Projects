<?php 

class DB {
  private $conn;

  public function __construct() {
    try {
      $this->conn = new PDO('mysql:host=localhost;dbname=fileupload', 'root', '');
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }

  // Inserting Image
  public function insertPic($id, $pic) {
    $query = "INSERT INTO profilepic (id, profilepic) VALUES (:id, :profilepic)";
    $statement = $this->conn->prepare($query);
    $statement->execute(['id' => $id, 'profilepic' => $pic]);
  }