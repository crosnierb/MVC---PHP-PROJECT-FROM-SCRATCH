<?php
/*** include the core.php file ***/
//include_once ('Config/core.php');
//include_once ('Controllers/DefaultsController.php');
//include_once ('Src/Router.php');

class Dispatcher {
  private $url;
  private $router;
  private $arrayCollection;

  function __construct($url) {
    $this->url = $url;
  }

  public function dispatcher() {
    $router = new Router($this->url);
    $arrayCollection = $router->parser();
    if (sizeof($arrayCollection) < 3) {
      $arrayCollection[2] = array();
    }
    
    $class = ucfirst($arrayCollection[0])."Controller";
    $method = $arrayCollection[1]."Action";
    $Object = new $class($arrayCollection[2]); // Create the object controller
    $Object->$method(); //call the action function controller
  }
}
?>
