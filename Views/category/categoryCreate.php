<?php
/*** include the core.php file ***/
include_once (__DIR__.'/../Config/core.php');

session_start();

if ($_SESSION["user"]["admin"] = 0){

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
  <title>Welcome to pool_php_rush/step_3</title>
</head>
<body>
  <header>
    <p>Category</p>
  </header>
  <main>
    <section>
      <article>
        <h1>Create Categories</h1>
        <?php
        if (isset($_POST)) {
          $foo = new CategoryController($_POST['name'], $_POST['parent_id']);
          $bar = $foo->createCategory();
        }

        if ($bar != "Category created\n"){
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
                  <label for="name">Name:</label>
                  <input type="text" pattern="[a-zA-Z]+.{2,10}" id="form-name" maxlength="10" required name="name" />
                </li><br>
                <li>
                  <label for="parent_id">parent_id:</label>
                  <input type="number"  id="parent_id" name="parent_id" maxlength="7" required/>
                </li>
                <li>
                  <input type="submit" name = "create" value="Create category">
                </fieldset>
              </li>
            </ul>
          </form>
          <?php
        }
        else {
          print_r("<article><p>Category created</p></article>");
          $bar = $foo->displayCategory();
          print_r("<article>
            <p>
              Id: ".$bar['id']."<br>
              Name: ".$bar['name']."<br>
              Parent_id ".$bar['parent_id']."
              <p>
              </article>");
        }
        ?>
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
