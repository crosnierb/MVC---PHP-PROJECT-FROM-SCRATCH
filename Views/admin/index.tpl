<!DOCTYPE html>
<html>
<head>

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
              <a href="/session/destroy">logout</a>
            </li>
          </ul>
        </ul>
      </fieldset>
    </nav>
  </header>
  <main>
    <h1>My Administration view</h1>
    test: {{ params["test"] }}<br>
    id : {{ params["session"]["user_id"] }}<br>
    group: {{ params["session"]["user_group"] }}<br>
    status : {{ params["session"]["user_status"] }}<br>
    name : {{ params["session"]["user_name"] }}<br>
    email: {{ params["session"]["user_email"] }}<br>
  </main>
</body>
</html>
