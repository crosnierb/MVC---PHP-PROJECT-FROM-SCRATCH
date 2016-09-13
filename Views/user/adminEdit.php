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
  <title>Welcome to pool_php_rush/step_2</title>
</head>
<body>
  <header>
    <p>Edit</p>
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
        <h1>Edit User</h1>
        <?php
        if (isset($_POST)) {
          $foo = new UsersController($_POST['email'], NULL, $_POST['name'], NULL, $_POST['user_type'], NULL, $_POST['id']);
          $bar = $foo->editingUser();
        }

        if ($_GET['id']) {
          $foo = new UsersController(NULL, NULL);
          $foobar = $foo->displayById($_GET['id']);
          var_dump($foobar);
        }

        if ($bar != "User edited\n"){
          if (is_string($bar)){
            echo $bar;
          }
          else {
            print_r($bar[0]."<br>".$bar[1]."<br>".$bar[2]."<br>".$bar[3]);
          }
          ?>
          <form method="post">
            <ul>
              <fieldset>
                <li>
                <label for="name">Id:</label>
                  <input type="number" value="<?php echo $foobar["id"];?>" required name="id" />
                </li><br>
                <li>
                  <label for="name">Username:</label>
                  <input type="text" pattern="[a-zA-Z]+.{2,10}" id="form-name" maxlength="10" value="<?php print_r($foobar["username"]);?>" required name="name" />
                </li><br>
                <li>
                  <label for="email">Email:</label>
                  <input type="email"  value="<?php echo $foobar["email"];?>"  id="email" name="email" maxlength="255"required/>
                </li>
                <br>
                <li>
                <br></br>
                  <input type="radio" name="user_type" value="1" checked="<?php if ($foobar["admin"] == '1') { echo "checked"; }?>" >Admin
                  <input type="radio" name="user_type" value="0" checked="<?php if ($foobar["admin"] == '0') { echo "checked"; }?>" > User
              </li>
              <br>
              <li>
                  <input type="submit" name = "edit" value="Edit user">
                </fieldset>
              </li>
            </ul>
          </form>
          <?php
        }
        else {
          print_r("<article><p>User edited</p></article>");
          $bar = $foo->displayUser();
          print_r("<article><p>Username: ".$bar['username']."<br> Email: ".$bar['email']."<p></article>");
        }
        ?>
      </article>
    </section>
    <aside>
      <abbr title ="Citation">
        <?php
        if (!$bar['username']){
          echo "Please edit an admin/user.";
        }
        else {
          echo "Welcome in !! You can connect now!";
        } ?>
      </abbr>
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
