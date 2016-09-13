<?php
/*** include the twig librairy ***/
require_once('../Libs/Twig-1.x/lib/Twig/Autoloader.php');

class AppController {
  private $params;

  function __construct() {
  }

  public function loadModel($model) {
    return new $model();
  }

  public function beforeRender() {

  }

  public function beforeFilter() {

  }

  public function afterRender() {

  }

  public function afterFilter() {

  }

  public function set($name, $value) {
  $this->params = array($name => $value);
  }

  public function setLayout($layout) {

  }

  public function render($file = NULL) {
    if (!$file) {
      $method = strtolower(str_replace("Action", "", debug_backtrace()[1]['function']));
      $class = strtolower(str_replace("Controller", "", get_class($this)));
      $file = $class."/".$method.".tpl";
    }

    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('../Views/');
    $twig = new Twig_Environment($loader, array('auto_reload' => true));
    $template = $twig->loadTemplate($file);
    $lexer = new Twig_Lexer($twig, array(
      'tag_comment'   => array('{#', '#}'),
      'tag_block'     => array('{%', '%}'),
      'tag_variable'  => array('{{', '}}'),
      'interpolation' => array('#{', '}')
    ));

    $twig->setLexer($lexer);
    echo $template->render($this->params);
  }

  protected function redirect($url = NULL) {
    if (is_string($url)) {
      header('Location:'.$url);
    }

    if (is_array($url)){
      if (array_key_exists("controller",$url))
        $path = '/'.$url['controller'].'/index';
        header('Location:'.$path);
      if (array_key_exists("action",$url))
        $path = '/'.get_class($this).'/'.$url['action'];
        header('Location:'.$path);
      }
    if ($url == NULL) {
      header('Location: /'.strtolower(str_replace("Controller", "", get_class($this))).'/index');
    }
  }
}
?>
