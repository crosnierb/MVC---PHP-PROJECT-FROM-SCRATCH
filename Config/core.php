<?php
/*** include config/database ***/
include ('databases.php');

/*** include config/Configurationfile ***/
include ('configurationfiles.php');

/*** Twig lib ***/
include ('../Libs/vendor/autoload.php');

/*** include Src/AppController***/
include ('../Src/AppController.php');

/*** include Src/Conf ***/
include ('../Src/Configure.php');

/*** include Src/Router ***/
include ('../Src/Router.php');

/*** include Src/Router ***/
include ('../dispatcher.php');

/*** include Src/Session***/
include ('../Src/Session.php');

/*** auto load Models ***/
spl_autoload_register(function ($class) {
  $patternController = "/[a-zA-Z]{2}(ontroller)/";
  $patternInt = "/[a-zA-Z]{2}(nterface)/";

  if (preg_match($patternController, $class)){
    $path = "Controllers";
  } else if (preg_match($patternInt, $class)) {
    $path = "Src/Interfaces";
  } else {
    $path = "Models";
  }
  include ('../'.$path.'/'.$class.'.php');
});
?>
