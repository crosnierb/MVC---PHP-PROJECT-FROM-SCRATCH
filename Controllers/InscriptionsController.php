<?php
/*** include the core.php file ***/
include_once ('../Config/core.php');

class InscriptionsController extends AppController {
  private $params;
  private $error;

  function __construct($params) {
    parent::__construct();
    $this->params = $params;
    $this->error = NULL;
  }

  public function indexAction() {
    $this->set("params",array('test' => "toto"));
    return $this->render();
  }

  public function newAction() {
      if ((!preg_match("/^[a-zA-Z ]*$/", $this->params["name"])) || ((strlen($this->params["name"]) < 3) || (strlen($this->params["name"]) > 10))) {
        $this->error[] = "Invalide name\n";
      }

      if ((strlen($this->params["email"]) > 255) || (strlen($this->params["email"]) < 5) || (!filter_var($this->params["email"], FILTER_VALIDATE_EMAIL) == true)) {
        $this->error[] = "Invalide email\n";
      }

      if ((strlen($this->params["password"]) < 3) || (strlen($this->params["password"]) > 10) || ($this->params["password"] != $this->params["password_confirmation"])) {
        $this->error[] = "Invalide password confirmation\n";
      }

      if ($this->error == NULL) {
      $db = $this->loadModel("User");
			if (!$db->check(array('email' => $this->params["email"]))) {
				if($db->add($this->params)) {
          $this->set("params",array('success' => "User created"));
          return $this->render('inscriptions/index.tpl');
				}
      }
      $this->set("params",array('error' => "Invalide: User exist"));
      return $this->render('inscriptions/index.tpl');
		}
    $this->set("params",array('error' => $this->error));
    return $this->render('inscriptions/index.tpl');
  }
}
