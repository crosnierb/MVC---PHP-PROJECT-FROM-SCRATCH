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
      <legend>create:</legend>
      <form method="post" action="/users/createUser">
        <ul>
          <h1>Creation User:</h1>
          {{ params['test'] }}
          {{ params['error']}}
          {{ params['error'][0] }}
          {{ params['error'][1] }}
          {{ params['error'][2] }}
          {{ params['error'][3] }}
          {{ params['success'] }}
          <li>
            <label for="name">Username:</label>
            <input type="text" pattern="[a-zA-Z]+.{2,10}" maxlength="10" required name="name" />
          </li><br>
          <li>
            <label for="email">Email:</label>
            <input type="email" name="email" maxlength="255"required/>
          </li>
          <br>
          <li>
            <label for="password">Password:</label>
            <input type="password" pattern=".{3,10}"  maxlength="10" required name="password" />
          </li>
          <br>
          <li>
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="password" pattern=".{3,10}"  maxlength="10" required name="password_confirmation" />
          </li>
         <li>
           <input type="radio" name="group" value="moderator" >Moderator
           <input type="radio" name="group" value="writer"  />Writer
           <input type="radio" name="group" value="user"  checked />User
         </li>
         <br>
         <li>
           <input type="radio" name="status" value="1" checked/>Active
           <input type="radio" name="status" value="0" />Unactive
         </li>
         <br>
         <li>
           <input type="submit" name = "create" value="Create user" />
         </li>
       </fieldset>
     </ul>
    </form>
  </main>
</body>
</html>
