<?php
include_once("../model/Category.class.php");

class CategoryController extends Category {
	const URL = "https://localhost/pool_php_rush/step_3/";
	const ERROR_LOG_FILE = "errors.log";
	protected $error_log_file = ERROR_LOG_FILE;
	private $error = array();

	private $name;
	private $parent_id;
	private $id;

	function __construct($name = NULL, $parent_id = NULL, $id = NULL) {
		parent::__construct();
		$this->name = $name;
		$this->parent_id = $parent_id;
		$this->id = $id;
	}

  //getter/setter
	public function getName() {
		return $this->name;
	}

	public function getParentId(){
		return $this->parent_id;
	}

	public function getId(){
		return $this->id;
	}

  //methode
	public function createCategory() {
		if (self::verify_form() == true) {
				if(Category::add($this)) {
					return "Category created\n";
				}
				return "Invalide: no category created\n";
			}
		return $this->error;
	}

	public function deleteCategory($id){
		if (!Category::verifyId($id)) {
			if(Category::delete($id)) {
				return "Category deleted\n";
			}
		}
		return "Invalide: Category not deleted\n";
	}

	public function editingCategory(){
		if(Category::edit($this)){
			return "Field category modified\n";
		}
		return "Invalide: field category not modified\n";
	}


	public function verify_form() {
		if ((empty($this->name)) || (!preg_match("/^[a-zA-Z ]*$/", $this->name)) || ((strlen($this->name) < 3) || (strlen($this->name) > 10))) {
			$this->error[] = "Invalide name\n";
		}

		if ((empty($this->parent_id)) || (strlen($this->parent_id) < 0)) {
			$this->error[] = "Invalide parent_id\n";
		}

		if (!$this->error) {
			return true;
		}
	}

	public function displayCategory($id){
		return Category::displayById($id);
	}
}

?>
