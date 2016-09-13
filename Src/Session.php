<?php
class Session extends AppController {
    public static $authentificate = [];

    public function __construct($params = NULL) {
        session_start();
        self::init($params);
        self::$authentificate = array ('user_id' =>  $this->getValue('user_id', $_SESSION),
                                'user_group' => $this->getValue('group_id', $_SESSION),
                                'user_status' => $this->getValue('status', $_SESSION),
                                'user_name' =>  $this->getValue('name', $_SESSION),
                                'user_email' =>  $this->getValue('email', $_SESSION));

    }

    private function getValue($value, $sess_or_cookie){
      if (isset($sess_or_cookie[$value]))
        return $sess_or_cookie[$value];
      return NULL;
    }

    public static function init($params) {
        if (isset($_COOKIE["user"])) {
          $_SESSION['user_id'] = $_COOKIE['id'];
          $_SESSION["group_id"] = $params['group'];
          $_SESSION["status"] = $params['status'];
          $_SESSION['name'] = $_COOKIE['name'];
          $_SESSION['email'] = $_COOKIE['email'];
        }
        else if ($params != NULL){
          $_SESSION["user_id"] = $params['id'];
          $_SESSION["group_id"] = $params['group'];
          $_SESSION["status"] = $params['status'];
          $_SESSION["name"] = $params['username'];
          $_SESSION["email"] = $params['email'];
        }
    }

    public static function set_cookie($params) {
      setcookie('user_id', $params['id'], time()+3600);
      setcookie('group_id', $params['group'], time()+3600);
      setcookie('status', $params['status'], time()+3600);
      setcookie('name', $params['username'], time()+3600);
      setcookie('email', $params['email'], time()+3600);
    }

    public static function destroy() {
      if (isset($_COOKIE)) {
    		unset($_COOKIE["user_id"]);
        unset($_COOKIE["group_id"]);
        unset($_COOKIE["name"]);
        unset($_COOKIE["email"]);
        setcookie('user_id', NULL, time()-3600);
        setcookie('group_id', NULL, time()-3600);
        setcookie('name', NULL, time()-3600);
        setcookie('email', NULL, time()-3600);
      }
        session_start();
        session_unset();
        session_destroy();
        AppController::redirect("/defaults/index");
    }

    public static function get_authentificate() {
        return self::$authentificate;
    }

    public static function Session_Exist() {
    $session = new Session();
    $user = $session->get_authentificate();
      if ($user["user_status"] == 0) {
        AppController::redirect("/defaults/index");
      }
      return $user;
    }

    public static function exclude_Session() {
    $session = new Session();
    $user = $session->get_authentificate();
      if ($user["user_status"] == 1) {
        AppController::redirect("/admin/index");
      }
    }
}
