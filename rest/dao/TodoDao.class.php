<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class TodoDao{

  private $conn;

  //constructor of dao class
  public function __construct(){

    $servername = "localhost";
    $username = "todo";
    $password = "todo";
    $schema = "todo";
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  //Method used to read all todo objects from db
  public function getAll(){

    $stmt = $this->conn->prepare("SELECT * FROM todos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //Method used to add todo to the db
  public function add($description, $created){

    $stmt = $this->conn->prepare("INSERT INTO todos (description, created) VALUES ('$description', '$created')");
    $stmt->execute();
  }

  //Delete todo record from the database
  public function delete($id){

    $stmt = $this->conn->prepare("DELETE FROM todos WHERE id=$id");
    $stmt->execute();
  }

  //update todo record
  public function update($id, $description, $created){

    $stmt = $this->conn->prepare("UPDATE todos SET description='$description', created='$created' WHERE id=$id");
    $stmt->execute();
  }

}

?>
