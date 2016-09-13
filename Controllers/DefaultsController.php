<?php
/*** include the core.php file ***/
include_once ('../Config/core.php');

class DefaultsController extends AppController {
  private $params;

  function __construct($params = NULL) {
    parent::__construct();
    $this->params = $params;
  }

  public function indexAction() {
    Session::exclude_Session();
    $this->set("params",array('test' => "toto"));
    return $this->render();
  }
}
