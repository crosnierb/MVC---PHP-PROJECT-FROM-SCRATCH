<?php
require_once(__DIR__.'/../../Models/user.model.php');

class MyLib{

    function __construct($name = null, $email = null, $password = null, $password_confirmation = null, $group_id = null){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
        $this->group_id = $group_id;

        $this->salt = $this->hash = "";
        $this->nameError = $this->emailError = $this->passwordError = $this->success = $this->boolFalse = "";
        $this->nameSize = strlen($this->name);
        $this->emailSize = strlen($this->email);
        $this->passwordSize = strlen($this->password);
        $this->valid = false;
        $this->error = false;
    }



    public function my_verify_login(){

        if ( ( empty($this->email) ) || ( $this->emailSize > 255 ) ||( $this->emailSize < 5 ) || ( !preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $this->email) ) ){
            $this->emailError = "Invalide email\n";
            $this->error = true;
        } else {
            $this->valid = true;
        }

        if ( ( empty($this->password) ) || ($this->passwordSize < 3) || ($this->passwordSize > 10) ){
            $this->passwordError = "Invalide password\n";
            $this->error = true;
        } else { 
            $this->valid = true;
        }

        $state = array(
            // state abbreviation, booleen
            array('valid', $this->valid),
            array('error', $this->error));

        return $state;
    }

    public function my_verify_form(){
        if ( ( empty($this->name) ) || ( !preg_match("/^[a-zA-Z ]*$/", $this->name) ) || ( ( $this->nameSize < 3 ) || ( $this->nameSize > 10 ) ) ){
            $this->nameError = "Invalide name\n";
            $this->error = true;
        } else {
            $this->valid = true;
        }

        if ( ( empty($this->email) ) || ( $this->emailSize > 255 ) ||( $this->emailSize < 5 ) || ( !preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $this->email) ) ){
            $this->emailError = "Invalide email\n";
            $this->error = true;
        } else {
            $this->valid = true;
        }

        if ( ( empty($this->password) ) || ($this->passwordSize < 3) || ($this->passwordSize > 10) || ($this->password != $this->password_confirmation) ) {
            $this->passwordError = "Invalide password or password confirmation\n";
            $this->error = true;
        } else { 
            $this->valid = true;
        }

        $state = array(
            // state abbreviation, booleen
            array('valid', $this->valid),
            array('error', $this->error));

        return $state;
    }

	public function my_password_hash(){
    	$timeTarget = 0.05; // 50 milliseconds
    	$cost = mt_rand(9,12);
    	$random0 = mt_rand(1000, 9999);
    	$random1 = mt_rand(10000,99999);
    	$random2 = mt_rand(100000, 99999999);
    	$random3 = chr(mt_rand(110, 120));
    	$random4 = chr(mt_rand(1, 23));
    	$random5 = chr(mt_rand(23, 43));
    	$random6 = chr(mt_rand(43, 73));
    	$random7 = chr(mt_rand(73,100));
    	$random8 = chr(mt_rand(100, 110));
    
    	$salt = $random0.$random7.$random6.$random3.$random1.$random5.$random8.$random2.$random4;

    	$options = [
            //'cost' => $cost, //add a cost it's good for add a random MD5 hard
            'salt' => $salt,
    	];
    
    	do{
        	$start = microtime(true);
        	$this->hash = password_hash($this->password, PASSWORD_DEFAULT, $options);//, $options);
        	$end = microtime(true);
    	} while (($end - $start) < $timeTarget);

 		$verify = self::my_password_verify($this->password, $salt, $this->hash);

        if ($verify == true){
     		return $this->hash;
     	} else {
        	return "echec: password hash error";
     	} 
	}

	public function my_password_verify($password, $salt, $hash) {
    	if (password_verify($password, $hash)) {
        	
        	return true;
    	} else {

        	return false;
        }
    }

    public function my_registration(){
        $modelUser = new user("","",$this->email) ;
        $email_exist = $modelUser->my_email_verify();

        if ($email_exist == true){   
            return false;
        } else{
            $this->hash = self::my_password_hash();
            $create = new user(null, $this->name, $this->email, $this->hash, $this->group_id);
            return $create->createUser();
        }
    }

    public function my_update() {
        $modelUser = new user("",$this->email);
        $email_exist = $modelUser->my_email_verify();

        if ($email_exist == false){
            return false;
        } else {
            $login = new user("", $this->name, $this->email, $this->password, $this->group_id);
            $this->hash = self::my_password_hash();

            return $update->updateUser();
        }
    }

    public function my_login(){
        $modelUser = new user("",$this->email);
        $email_exist = $modelUser->my_email_verify();

        if ($email_exist == false){
            return false;
        }else{
            $login = new user(null, null, $this->email, $this->password);

            return $login->loginUser();
        }
    }

    public function showError(){

        return $error = array ($this->success."\n", $this->nameError."\n", $this->emailError."\n", $this->passwordError."\n"); 
    }
} 
?>