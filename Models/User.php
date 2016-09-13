<?php
/*** include the core.php file ***/
/*include_once (__DIR__.'/../Config/core.php');

class User extends Database implements IModelInterface {
private $bdd;
private $conf;
private $querry;
private $checking;
private $result;
private $hash;

function __construct() {
parent::__construct();
$this->bdd = Database::connectDb();
}


public function add($params) {
$this->hash = password_hash($params["password"], PASSWORD_DEFAULT);

if (!array_key_exists('group',$params)) {
$params["group"] = "user";
}

if (!array_key_exists('status',$params)) {
$params["status"] = 1;
}

$this->querry = $this->bdd->prepare("INSERT INTO users(username, password, email, group, status, date_creation) VALUES (:username, :hash, :email, :group, :status, NOW())");
$this->querry->bindParam(':username', $params["name"], PDO::PARAM_STR, 255);
$this->querry->bindParam(':hash', $this->hash, PDO::PARAM_STR, 255);
$this->querry->bindParam(':email', $params["email"], PDO::PARAM_STR, 255);
$this->querry->bindparam(':group', $params["group"], PDO::PARAM_STR, 255);
$this->querry->bindparam(':status', $params["status"], PDO::PARAM_INT);
$this->querry->execute();
return true;
}

public function edit($params) {
$this->hash = password_hash($params["password"], PASSWORD_DEFAULT);
$this->querry = $this->bdd->prepare("UPDATE users SET username = :username, email = :email, group = :group, status = :status, date_update = NOW() WHERE id = :id;");
$this->querry->bindParam(':username', $params["name"], PDO::PARAM_STR, 255);
$this->querry->bindParam(':email', $params["email"], PDO::PARAM_STR, 255);
$this->querry->bindparam(':group', $params["group"], PDO::PARAM_INT);
$this->querry->bindparam(':status', $params["status"], PDO::PARAM_INT);
$this->querry->bindparam(':id', $params["id"], PDO::PARAM_INT);

$this->querry->execute();
return true;
}

public function show($params = NULL) {
if ($params["email"])
$this->querry= $this->bdd->prepare('SELECT id, username, password, email, group, status, date_creation, date_update FROM users WHERE email = :email;');
$this->querry->bindParam('email', $params["email"], PDO::PARAM_STR, 255);
$this->checking = $this->bdd->prepare("SELECT COUNT(email) as 'compte' FROM users WHERE email = :email;");
$this->checking->bindParam(':email',$params["email"], PDO::PARAM_STR, 255);
$this->checking->execute();
$this->result = $this->checking->fetch(PDO::FETCH_ASSOC);

if ($this->result['compte'] != 0) {
$this->querry->execute();
return $this->querry->fetch(PDO::FETCH_ASSOC);
}
else if ($params["id"])
$this->querry= $this->bdd->prepare('SELECT id, username, password, email, group, status, date_creation, date_update FROM users WHERE id = :id;');
$this->querry->bindParam('id', $params["id"], PDO::PARAM_INT);
$this->checking = $this->bdd->prepare("SELECT COUNT(id) as 'compte' FROM users WHERE id = :id;");
$this->checking->bindParam(':id',$params["id"], PDO::PARAM_INT);
$this->checking->execute();
$this->result = $this->checking->fetch(PDO::FETCH_ASSOC);

if ($this->result['compte'] != 0) {
$this->querry->execute();
return $this->querry->fetch(PDO::FETCH_ASSOC);
}
else
$this->querry= $this->bdd->prepare('SELECT id, username, password, email, group, status, date_creation, date_update  FROM users;');
$this->querry->execute();
return $this->querry->fetchAll(PDO::FETCH_ASSOC);
}

public function delete($params) {
$this->querry = $this->bdd->prepare("DELETE FROM users WHERE id = :id;");
$this->querry->bindparam(':id', $params["id"], PDO::PARAM_INT);
$this->querry->execute();
return true;
}

public function connect($email, $pwd) {
$this->querry = $this->bdd->prepare("SELECT password FROM users WHERE email = :email;");
$this->querry->bindParam(':email', $email, PDO::PARAM_STR, 255);
$this->querry->execute();
$result = $this->querry->fetch(PDO::FETCH_ASSOC);

if (password_verify($pwd, $result["password"]) == true) {
return true;
}
return false;
}

public function check($params = NULL) {
if ($params["email"]) {
$this->querry = $this->bdd->prepare("SELECT email FROM users WHERE email = :email;");
$this->querry->bindParam(':email', $params["email"], PDO::PARAM_STR, 255);
$this->querry->execute();
$result = $this->querry->fetch();
if ($params["email"] == $result['email']) {
return true;
}
return false;
}
else if ($params["id"]) {
$this->querry = $this->bdd->prepare("SELECT id FROM users WHERE id = :id;");
$this->querry->bindParam(':id', $params["id"], PDO::PARAM_INT);
$this->querry->execute();
$result = $this->querry->fetch();
if ($id == $result['id']) {
return true;
}
return false;
}
}
}
*/

/*** include the core.php file ***/
include_once (__DIR__.'/../Config/core.php');

class User implements IModelInterface {
  private $hash;
  private $querry;
  private $result;

  function __construct() {
  }

  public function add($params) {
    $this->hash = password_hash($params["password"], PASSWORD_DEFAULT);
    if (!array_key_exists('group',$params)) {
      $params["group"] = "user";
    }

    if (!array_key_exists('status',$params)) {
      $params["status"] = 1;
    }
    SPDO::getInstance()->prepare("INSERT INTO users(username, password, email, users.group, status, date_creation) VALUES (?, ?, ?, ?, ?, NOW())", $params['name'], $this->hash, $params['email'], $params['group'], $params['status']);
    return true;
  }

  public function edit($id, $params) {
    SPDO::getInstance()->prepare("UPDATE users SET users.username = ?, users.email = ?, users.group = ?, users.status = ?, users.date_update = NOW() WHERE id = ?;", $params['name'], $params['email'], $params['group'], $params['status'], $id);
    return true;
  }

  public function editProfilUser($id, $params) {
    $this->hash = password_hash($params["password"], PASSWORD_DEFAULT);
    SPDO::getInstance()->prepare("UPDATE users SET users.username = ?, users.password = ?, users.date_update = NOW() WHERE id = ?;", $params['name'],  $this->hash, $id);
    return true;
  }

  public function show($params = NULL) {
    if (array_key_exists('email',$params)) {
      $querry = SPDO::getInstance()->prepare("SELECT users.id, users.username, users.password, users.email, users.group, users.status, users.date_creation, users.date_update FROM users WHERE email = ?;", $params['email']);
      return $querry->fetch(PDO::FETCH_ASSOC);
    }
    else if (array_key_exists('id',$params)){
      $querry = SPDO::getInstance()->prepare("SELECT users.id, users.username, users.password, users.email, users.group, users.status, users.date_creation, users.date_update FROM users WHERE id = ?;", $params['id']);
      return $querry->fetch(PDO::FETCH_ASSOC);
    }
    $querry = SPDO::getInstance()->prepare("SELECT * from users");
    return $querry->fetchAll(PDO::FETCH_ASSOC);
  }

  public function delete($params) {
    SPDO::getInstance()->prepare("DELETE FROM users WHERE id = ?;", $params['id']);
    return true;
  }

  public function connect($email, $pwd) {
    $querry = SPDO::getInstance()->prepare("SELECT password FROM users WHERE email = ?", $email);
    $result = $querry->fetch(PDO::FETCH_ASSOC);
    if (password_verify($pwd, $result["password"]) == true) {
      return true;
    }
    return false;
  }

  public function check($params = NULL) {
    if (array_key_exists('email',$params)) {
      $querry = SPDO::getInstance()->prepare("SELECT email FROM users WHERE email = ?", $params['email']);
      $result = $querry->fetch(PDO::FETCH_ASSOC);
      if ($params["email"] == $result["email"]) {
        return true;
      }
      return false;
    }
    else if (array_key_exists('id',$params)) {
      $querry = SPDO::getInstance()->prepare("SELECT id FROM users WHERE id = ?", $params['id']);
      $result = $querry->fetch(PDO::FETCH_ASSOC);
      if ($params["id"] == $result["id"]) {
        return true;
      }
  return false;
  }
  }
}
