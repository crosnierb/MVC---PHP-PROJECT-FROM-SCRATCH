<?php
/*** include the core.php file ***/
include_once ('../Config/core.php');

class RoadworksController extends AppController {
  private $params;

  function __construct($params = NULL) {
    parent::__construct();
    $this->params = $params;
  }

  public function indexAction() {
    $this->set("params",array());
    return $this->render("roadworks/".$this->params['cat']."/".$this->params['view'].".tpl");
  }
}
