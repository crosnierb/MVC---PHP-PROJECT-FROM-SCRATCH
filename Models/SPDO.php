<?php
/*** include the core.php file ***/
include_once (__DIR__.'/../Config/core.php');

class SPDO {
    private $PDOInstance = null;
    private static $instance = null;

    private function __construct() {
        $this->PDOInstance = new PDO('mysql:dbname='.DEFAULT_SQL_DTB.';host='.DEFAULT_SQL_HOST,DEFAULT_SQL_USER ,DEFAULT_SQL_PASS);
    }

    public static function getInstance() {
        if (is_null(self::$instance))
            self::$instance = new SPDO();
        return self::$instance;
    }

    public function prepare($query, ...$param) {
        $pdo = $this->PDOInstance->prepare($query);

        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($param)) {
            if ($pdo->execute($param))
                return $pdo;
            return NULL;
        }
        if ($pdo->execute())
            return $pdo;
        return NULL;
    }
}
