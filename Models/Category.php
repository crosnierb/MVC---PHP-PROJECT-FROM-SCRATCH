<?php
/*** include the core.php file ***/
include_once (__DIR__.'/../Config/core.php');

abstract class Category extends Database {
  private $bdd;
  private $conf;
  private $querry;
  private $checking;
  private $result;

  function __construct() {
    $this->bdd = Database::connectDb();
  }

  public function add($arg) {
    $this->querry = $this->bdd->prepare("INSERT INTO categories(name, parent_id)
      VALUES (:name, :parent_id)");
    $this->querry->bindParam(':name', $arg->getName(), PDO::PARAM_STR, 255);
    $this->querry->bindParam(':parent_id', $arg->getParentId(), PDO::PARAM_INT);

    $this->querry->execute();
    return true;
  }

  public function edit($arg) {
    $this->querry = $this->bdd->prepare("UPDATE categories SET name = :name, parent_id = :parent_id WHERE id = :id;");
    $this->querry->bindParam(':name', $arg->getName(), PDO::PARAM_STR, 255);
    $this->querry->bindparam(':parent_id', $arg->getParentId(), PDO::PARAM_INT);
    $this->querry->bindparam(':id', $arg->getId(), PDO::PARAM_INT);

    $this->querry->execute();
    return true;
  }

  public function delete($id) {
    $this->querry = $this->bdd->prepare("DELETE FROM categories WHERE id = :id;");
    $this->querry->bindparam(':id', $id, PDO::PARAM_INT);

    $this->querry->execute();
    return true;
  }

  public function verifyId($id) {
    $this->querry = $this->bdd->prepare("SELECT id FROM categories WHERE id = :id;");
    $this->querry->bindParam(':id', $id, PDO::PARAM_INT);
    $this->querry->execute();
    $result = $this->querry->fetch();
    if ($id == $result['id']) {
      return true;
    }
    return false;
  }

  public function displayById($id) {
    $this->querry= $this->bdd->prepare('SELECT id, name, parent_id FROM categories WHERE id = :id;');
    $this->querry->bindParam('id', $id, PDO::PARAM_INT);
    $this->checking = $this->bdd->prepare("SELECT COUNT(id) as 'compte' FROM categories WHERE id = :id;");
    $this->checking->bindParam(':id',$id, PDO::PARAM_INT);
    $this->checking->execute();
    $this->result = $this->checking->fetch(PDO::FETCH_ASSOC);

    if ($this->result['compte'] != 0) {
      $this->querry->execute();
      return $this->querry->fetch(PDO::FETCH_ASSOC);
    }
  }
}

?>
