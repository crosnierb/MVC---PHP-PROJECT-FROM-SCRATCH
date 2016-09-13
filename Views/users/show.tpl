<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../webroot/css/home.css">
</head>
<body>
  <header>
    <nav>
      <fieldset>
        <ul>
          <legend>Nav</legend>
          <ul>
            <li>
              Menu:
              <a href="/">Home</a>
              <a href="/users">users</a>
              <a href="/articles">articles</a>
              <a href="/category">category</a>
              <a href="/users/profil">profil</a>
              <a href="/session/destroy">logout</a>
            </li>
          </ul>
        </ul>
      </fieldset>
    </nav>
  </header>
  <main>
    <h1>SHOW </h1>

        Id : {{ params["model"]["id"] }}<br>
        Username : {{ params["model"]["username"] }}<br>
        Group : {{ params["model"]["group"] }}<br>


  </main>
</body>
</html>
