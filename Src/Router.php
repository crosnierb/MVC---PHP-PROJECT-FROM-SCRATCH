<?php
/*** include the core.php file ***/
include_once ('../Config/core.php');

class Router extends AppController {
  private $ressource_requested;
  private $rout;
  private $url;
  private $routerCollection;
  static public $i = 0;

  function __construct($url) {
    $this->url = $url;
  }

  public function regexPath($path) {
    return '#' . str_replace([":int:", ":string:"], ["\d+", ".+"], $path) . '#';
  }

  public function parser() {
    if ($this->url == "/" || $this->url == "/index.php") {
      return array("defaults", "index");
    }

    if ($this->url == "/session/destroy") {
      Session::destroy();
    }

    $this->ressource_requested = explode('/', trim($this->url, '/'));

    if ($this->ressource_requested[1] == NULL) {
    $this->redirect(array(
      "controller" => $this->ressource_requested[0]
    ));
  }

  if (isset($this->ressource_requested[3])) {
    $_POST = array("cat" => $this->ressource_requested[2], "view" => $this->ressource_requested[3]);
  }
  else if (isset($this->ressource_requested[2])) {
    $_POST = array("id" => $this->ressource_requested[2]);
  }

    $this->rout = [
      self::regexPath("session/destroy") => [0, 1],
      self::regexPath("inscriptions/index") => [0, 1],
      self::regexPath("inscriptions/new") => [0, 1],
      self::regexPath("connections/index") => [0, 1],
      self::regexPath("connections/new") => [0, 1],
      self::regexPath("defaults/index") => [0, 1],
      self::regexPath("admin/index") => [0, 1],
      self::regexPath("users/index") => [0, 1],
      self::regexPath("users/show") => [0, 1],
      self::regexPath("users/edit") => [0, 1],
      self::regexPath("users/editUser") => [0, 1],
      self::regexPath("users/new") => [0, 1],
      self::regexPath("users/createUser") => [0, 1],
      self::regexPath("users/profil") => [0, 1],
      self::regexPath("users/profil/0") => [0, 1],
      self::regexPath("users/profil/1") => [0, 1],
      self::regexPath("users/editProfileUser") => [0, 1],
      self::regexPath("users/delete") => [0, 1],
      self::regexPath("roadworks/index/js/\w") => [0, 1],
      self::regexPath("roadworks/index/php/\w") => [0, 1],
      self::regexPath("roadworks/index/csshtml/\w") => [0, 1],
      self::regexPath("roadworks/index/drupal_prestashop/\w") => [0, 1],
      self::regexPath("roadworks/index/symfony_rails/\w") => [0, 1],
    ];

    foreach ($this->rout as $regex => $indices) {
      if (preg_match($regex, $this->url)) {
        foreach ($indices as $index) {
          $this->routerCollection[] = $index > -1 ? $this->ressource_requested[$index] : null;
        }

        $this->routerCollection[] = $_POST;
        return $this->routerCollection;
      }
    }
    return null;
  }
}
?>
