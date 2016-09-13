<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../webroot/css/home.css">
  <title>Inscription</title>
</head>
<body>
  <header>
    <div class="website-title">
      Coding Blog | Inscription
    </div>
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
      <legend>Profil:</legend>
      <form method="post" action="/users/editProfileUser">
        <ul>
          <h1>Creation User:</h1>
          {{ params['test'] }}
          {{ params['error']}}
          {{ params['error'][0] }}
          {{ params['error'][1] }}
          {{ params['error'][2] }}
          {{ params['error'][3] }}
          {{ params['success'] }}
          <li><br>
            group: {{ params["session"]["user_group"] }}<br><br>
            status : {% if params["session"]["user_status"] == 1 %} Actif {% else %} Inactif {% endif %}<br><br>
            email: {{ params["session"]["user_email"] }}<br><br>
          </li>
          <li>
            <input type="hidden" value="{{ params['session']['user_email'] }}" required>
            <label for="name">Username:</label>
            <input type="text" pattern="[a-zA-Z]+.{2,10}" maxlength="10" name="name" value="{{ params['model']['username'] }}" required />
          </li><br>
          <br>
          <li>
            <label for="password">Password:</label>
            <input type="password" pattern=".{3,10}"  maxlength="10" name="password" required/>
          </li>
          <br>
          <li>
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="password" pattern=".{3,10}"  maxlength="10" name="password_confirmation" required/>
          </li>
         <br>
         <li>
           <input type="submit" name = "create" value="Edit profil" />
         </li>
       </fieldset>
     </ul>
    </form>
  </main>
</body>
</html>
