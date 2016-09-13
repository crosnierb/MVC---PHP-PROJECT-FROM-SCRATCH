<?php
/*** include the core.php file ***/
include_once ('../Config/core.php');

class ConnectionsController extends AppController {
  private $params;
  private $user;
  private $error;
  private $succes;


  function __construct($params) {
    parent::__construct();
    $this->params = $params;
    $this->error = NULL;
  }

  public function indexAction() {
    $this->set("params",array('test' => "toto"));
    return $this->render("connections/index.tpl");
  }

  public function newAction() {
    if ((strlen($this->params["email"]) > 255) || (strlen($this->params["email"]) < 5) || (!filter_var($this->params["email"], FILTER_VALIDATE_EMAIL) == true)) {
      $this->error[] = "Invalide email\n";
    }

    if ((strlen($this->params["password"]) < 3) || (strlen($this->params["password"]) > 10)) {
      $this->error[] = "Invalide password or password confirmation\n";
    }

    if ($this->error == NULL) {
      $db = $this->loadModel("User");
      if ($db->check(array('email' => $this->params["email"]))) {
        if ($db->connect($this->params["email"], $this->params["password"]) == true) {
          $this->user = $db->show(array('email' => $this->params["email"]));
          new Session($this->user);
          if (isset($this->params["autologin"]) && $this->params["autologin"] == 1) {
            Session::set_cookie($this->user);
          }
          $this->redirect("/admin/index");
        }
        $this->set("params", array('error' => "Incorrect email or password"));
        return $this->render('connections/index.tpl');
      }
      $this->set("params", array('error' => "Incorrect email or password"));
      return $this->render('connections/index.tpl');
    }
  }
}
