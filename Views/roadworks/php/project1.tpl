  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>Crosnierb - project 1</title>
    <link rel="stylesheet" href="../../../css/roadworks.css">
    <script src="../../../js/jquery-3.1.0.min/index.js"></script>
    <script src="../../../js/scrip-mindmap/mymindmap.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="nav">
        <ul>
          <div style="text-align:left;font-size:20px; weight-font:bold; color:#fff;">Menu:</div>
          <li><a class="current" href="/">Curiculum Vitae</a></li>
          <li><a href="/roadworks/index/csshtml/csshtml">Html5/Css3</a></li>
          <li><a href="/roadworks/index/js/js_native">JS-Native</a></li>
          <li><a href="/roadworks/index/js/jquerry">JQuerry</a></li>
          <li><a class="active" href="/roadworks/index/php/php">Php5/POO</a></li>
          <li><a href="/roadworks/index/drupal_prestashop/drupal_prestashop">Drupal8/Prestashop</a></li>
          <li><a href="/roadworks/index/symfony_rails/symfony_rails">Symphony3/Rail</a></li>
        </ul>
      </div>
      <nav>
        <a href="/roadworks/index/php/php" class="btn prev">
          &larr; Previous Project
        </a>
        <a href="/roadworks/index/php/project2" class="btn next">
          Next Project &rarr;
        </a>

        <div id="num">
          <div><a id="link" href="/roadworks/index/php/php">sommaire</a></div>
        <a id="link" href="/roadworks/index/php/project1">1</a>-
        <a id="link" href="/roadworks/index/php/project2">2</a>
      </div>
      </nav>
      <div class="exercice">
        <header>
            By Epitech-Coding.Academy: Php.
        </header>
        <section>
          <p>
            <h1>Lorem</h1>
          </p>
          <article>
          
              <form method="post" action="index.php">
                <ul>
                  <li><label for="name">Name :</label><input type="text" pattern="[a-zA-Z]+" id="form-name" required name="name" /></li>
                  <li><input type="submit" value="submit" formaction="index.php"></li>
                </ul>
              </form>
           <?php
                }
                  else {
                      $name = $_POST['name'];
                      print_r("<article><p>Hello $name</p></article>");
                    }
            ?>
          </article>
        </section>
        <footer>
          <div>
            Licence by Crosnier de Bellaistre Jack W.
          </div>
        </footer>
      </div>
    </div>
  </body>
  </html>
