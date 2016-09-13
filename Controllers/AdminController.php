<?php
/*** include the core.php file ***/
include_once ('../Config/core.php');

class AdminController extends AppController {
  private $params;

  function __construct($params = NULL) {
    parent::__construct();
    $this->params = $params;
  }

  public function indexAction() {

    $user = Session::Session_Exist();

    $this->set("params",array('test' => "toto", 'session' => $user));
    return $this->render();
  }
}
