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
    <p>Display Users</p>
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
        <h1>Display User</h1>
        <?php
          $foo = new UsersController(NULL, NULL);
          print_r("<article><p>Display User</p></article>");
          $bar = $foo->displayU($_GET['id']);
          print_r("<article><p>
            Id: ".$bar['id']."<br>
            Username: ".$bar['username']."<br>
            Email: ".$bar['email']."<br>
            Admin: ".$bar['admin'].
            "<p></article>");
        ?>
      </article>
    </section>
    <aside>
      <abbr title ="Citation">
        <?php
        ?>
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
