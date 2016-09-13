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
    <p>Display</p>
  </header>
  <main>
    <section>
      <article>
        <h1>Display category</h1>
        <?php
          $foo = new CategoryController();
          print_r("<article><p>Display categories</p></article>");
          $bar = $foo->displayCategory(1);
        print_r("<article>
          <p>
            Id: ".$bar['id']."<br>
            Name: ".$bar['name']."<br>
            Parent_id ".$bar['parent_id']."
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
