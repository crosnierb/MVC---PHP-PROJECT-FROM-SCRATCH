<?php
/*** include the core.php file ***/
include_once (__DIR__.'/../Config/core.php');

session_start();
if ($_SESSION["user"]["admin"] == 0){
	header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en-FR">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="pool_php_rush">
	<meta name="authors" content="CrendalC | CrosnierB ">
	<link rel="stylesheet" href="../businessSite.css" type="text/css" media="screen">
	<title>Welcome to pool_php_rush/step_1</title>
</head>
<body>
	<header>
		<legend>Admin User</legend>
</header>
<main>
	<section>
		<article>
			<nav>
				<ul>
					<fieldset>
						<legend>Nav</legend>
						<ul>
					<li>Menu: <a class="active" href="index.php">Home</a>
					<a href="adminUser.php">admin user</a> <a href="adminProduct.php">admin product</a></li>
				</ul>
				</ul>
			</fieldset>
			</nav>

		</article>
		<article>
			<FORM METHOD="LINK" ACTION="adminCreate.php">
<INPUT TYPE="submit" VALUE="Create user">
</FORM>
<table>
			<?php
			$foo = new UsersController($_POST['email'], $_POST['password'], $_POST['name'], $_POST['password_confirmation']);
			if ($_GET['id']) {
				$foo->delete($_GET['id']);
			}
			$bar = $foo->showAllUsers();
			for($i = 0; $i < sizeof($bar);$i++)
			{
				print_r(
				"
		 <ul>
		 <li>
		 <ul>
		 		 <li>".$bar[$i]["id"]."
				 ".$bar[$i]["username"]."
				 ".$bar[$i]["admin"]."
				 <a class='main' href='adminEdit.php?id=".$bar[$i]["id"]."'>Edit</a>
				 <a href='adminUser.php?id=".$bar[$i]["id"]."'>delete</a>
				 <a href='adminDisplay.php?id=".$bar[$i]["id"]."'>display</a>
				 </li>
				 </ul>
			</li>
		 </ul>
		 "
	 );
			}
			?>
   </table>
  	</article>
			<article>
				<form method="post" action="">
				<label for="logout"></label><input type="submit" value="logout"><input name="return" type="hidden">
				<?php
				if (isset($_POST["return"])) {
					$foo = new UsersController(NULL,NULL);
					$foo->logout();
				}?>
			</form>
			</article>
		</section>
		<aside>
		</aside>
	</main>
	<footer>
		<address>
			Develloped by <a rel="nofollow" href="mailto:debellaistre@gmail.com">Crosnier De Bellaistre</a>.<br>
			57 rue d'Amsterdam, St Lazare, 75008 Paris<br>
			FRANCE - Call <a rel="nofollow" href="tel:+6494452687">445-2663</a>
		</address>
	</footer>
</body>
</html>
