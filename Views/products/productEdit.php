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
        <h1>Edit Product</h1>
        <?php
        if (isset($_POST)) {
          $foo = new productsController($_POST['name'], $_POST['price'], $_POST['category_id'], $_POST['id']);
          $bar = $foo->editingProduct();
        }

        if ($_GET['id']) {
          $foo = new productsController();
          $foobar = $foo->displayById($_GET['id']);
        }

        if ($bar != "Product edited\n"){
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
                  <input type="number" required name="id" value="<?php print_r($foobar["id"]);?>"/>
                </li><br>
                <li>
                <label for="name">Name:</label>
                <input type="text" pattern="[a-zA-Z]+.{2,10}" value="<?php print_r($foobar["name"]);?>" id="form-name" maxlength="10" required name="name" />
              </li><br>
              <li>
                <label for="price">Price:</label>
                <input type="number"  id="price" value="<?php print_r($foobar["price"]);?>" name="price" maxlength="7" required/>
              </li>
              <br>
              <li>
                <label for="category_id">category_id:</label>
                <input type="number"  id="category_id" value="<?php print_r($foobar["category_id"]);?>" name="category_id" maxlength="7" required/>
              </li>
              <li>
                <input type="submit" name = "edit" value="Edit product">
              </fieldset>
            </li>
          </ul>
        </form>
        <?php
      }
      else {
        print_r("<article><p>Product edited</p></article>");
        $bar = $foo->displayProduct();
        print_r("<article>
          <p>
            Id: ".$bar['id']."<br>
            Name: ".$bar['name']."<br>
            Price: ".$bar['price']."<br>
            Category_id ".$bar['category_id']."
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
