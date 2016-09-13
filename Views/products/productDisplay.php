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
    <p>Display</p>
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
        <h1>Display product</h1>
        <?php
          $foo = new productsController();
          print_r("<article><p>Display products</p></article>");
          $bar = $foo->displayProduct($_GET["id"]);
        print_r("<article>
          <p>
            Id: ".$bar['id']."<br>
            Name: ".$bar['name']."<br>
            Price: ".$bar['price']."<br>
            Category_id ".$bar['category_id']."
            <p>
            </article>");
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
