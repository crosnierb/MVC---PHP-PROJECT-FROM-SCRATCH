<?php
/*** include the core.php file ***/
include_once ('../Config/core.php');

class UsersController extends AppController {
  private $params;
  private $error;

  function __construct($params) {
    parent::__construct();
    $this->params = $params;
    $this->error = NULL;
  }

  public function indexAction() {
    $currentUser = Session::Session_Exist();
    $db = $this->loadModel("User");
    $usersList = $db->show();
    $this->set("params",array('model' => $usersList, 'session' => $currentUser));
    return $this->render();
  }

  public function showAction() {
    $currentUser = Session::Session_Exist();
    $db = $this->loadModel("User");
    $user = $db->show(array("id" => $this->params["id"]));
    $this->set("params",array('model' => $user, 'session' => $currentUser));
    return $this->render();
  }

  public function editAction() {
    $currentUser = Session::Session_Exist();
    $db = $this->loadModel("User");
    $user = $db->show(array("id" => $this->params["id"]));
    $this->set("params",array('model' => $user, 'session' => $currentUser));
    return $this->render();
  }

  public function newAction() {
    $currentUser = Session::Session_Exist();
    $db = $this->loadModel("User");
    $user = $db->show(array("id" => $this->params["id"]));
    $this->set("params",array('model' => $user, 'session' => $currentUser));
    return $this->render();
  }

  public function deleteAction() {
      $currentUser = Session::Session_Exist();
      $db = $this->loadModel("User");
      $db->delete(array("id" => $this->params["id"]));
      $this->redirect("/users/index");
  }

  public function profilAction() {
    $currentUser = Session::Session_Exist();
    $db = $this->loadModel("User");
    if ($this->params[id] == 1){
      $usersCurrent = $db->show(array("email" => $currentUser["user_email"]));
      $this->set("params",array('success' => "Profil Edit!", 'model' => $usersCurrent, 'session' => $currentUser));
      return $this->render();
    }

    $usersCurrent = $db->show(array("email" => $currentUser["user_email"]));
    $this->set("params",array('error' => "Profil not Edit!", 'model' => $usersCurrent, 'session' => $currentUser));
    return $this->render();
  }

  public function editProfileUserAction() {
    $currentUser = Session::Session_Exist();
      if ((!preg_match("/^[a-zA-Z ]*$/", $this->params["name"])) || ((strlen($this->params["name"]) < 3) || (strlen($this->params["name"]) > 10))) {
        $this->error[] = "Invalid name\n";
      }

      if ((strlen($this->params["password"]) < 3) || (strlen($this->params["password"]) > 10) || ($this->params["password"] != $this->params["password_confirmation"])) {
        $this->error[] = "Invalid password confirmation\n";
      }

      if ($this->error == NULL) {
          $db = $this->loadModel("User");
          $user = $db->show(array("email" => $currentUser["user_email"]));
          if ($db->editProfilUser($user['id'], $this->params)) {
            $this->redirect("/users/profil/1");
          }
      }
      $this->redirect("/users/profil/0");
    }

  public function editUserAction(){
    $currentUser = Session::Session_Exist();
  if ((!preg_match("/^[a-zA-Z ]*$/", $this->params["name"])) || ((strlen($this->params["name"]) < 3) || (strlen($this->params["name"]) > 10))) {
    $this->error[] = "Invalid name\n";
  }

  if ((strlen($this->params["email"]) > 255) || (strlen($this->params["email"]) < 5) || (!filter_var($this->params["email"], FILTER_VALIDATE_EMAIL) == true)) {
    $this->error[] = "Invalid email\n";
  }

  if ($this->error == NULL) {
  $db = $this->loadModel("User");
  $user = $db->show(array("email" => $this->params["email"]));
    if($db->editProfilUser($user['id'], $this->params)) {
        $userEdit = $db->show(array("email" => $this->params["email"]));
      $this->set("params",array('model' => $userEdit, 'success' => "User is edited"));
      return $this->render('users/edit.tpl');
    }
}
$this->set("params",array('model' => $user, 'error' => $this->error));
return $this->render('users/edit.tpl');
}

  public function createUserAction() {
    $currentUser = Session::Session_Exist();
      if ((!preg_match("/^[a-zA-Z ]*$/", $this->params["name"])) || ((strlen($this->params["name"]) < 3) || (strlen($this->params["name"]) > 10))) {
        $this->error[] = "Invalid name\n";
      }

      if ((strlen($this->params["email"]) > 255) || (strlen($this->params["email"]) < 5) || (!filter_var($this->params["email"], FILTER_VALIDATE_EMAIL) == true)) {
        $this->error[] = "Invalid email\n";
      }

      if ((strlen($this->params["password"]) < 3) || (strlen($this->params["password"]) > 10) || ($this->params["password"] != $this->params["password_confirmation"])) {
        $this->error[] = "Invalid password confirmation\n";
      }

      if ($this->error == NULL) {
      $db = $this->loadModel("User");
			if (!$db->check(array('email' => $this->params["email"]))) {
				if($db->add($this->params)) {
          $this->set("params",array('success' => "User created"));
          return $this->render('users/new.tpl');
				}
      }
      $this->set("params",array('error' => "Invalide: User exist"));
      return $this->render('users/new.tpl');
		}
    $this->set("params",array('error' => $this->error));
    return $this->render('users/new.tpl');
  }
}
