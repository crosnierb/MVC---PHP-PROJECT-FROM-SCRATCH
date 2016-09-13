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
      <legend>Edit:</legend>
      <form method="post" action="/users/editUser">
        <ul>
          <h1>Edit User:</h1>
          {{ params['test'] }}
          {{ params['error']}}
          {{ params['error'][0] }}
          {{ params['error'][1] }}
          {{ params['error'][2] }}
          {{ params['error'][3] }}
          {{ params['success'] }}
         <li>
           <label for="name">Name: </label>
           <input type="text" pattern="[a-zA-Z]+.{2,10}"id="form-name" maxlength="10" value="{{ params["model"]["username"] }}" required name="name" />
         </li><br>
         <li>
           <label for="email">Email</label>
           <input type="email"  id="email" name="email" value="{{params['model']['email'] }}" maxlength="255"required/>
         </li>
         <br>
         <li>
           <input type="radio" name="group" value="moderator" {% if params['model']['group'] == 'moderator' %}checked{% endif %}/>Moderator
           <input type="radio" name="group" value="writer"  {% if params['model']['group'] == 'writer' %}checked{% endif %} />Writer
           <input type="radio" name="group" value="user" {% if params['model']['group'] == 'user' %}checked{% endif %} />User
         </li>
         <br>
         <li>
           <input type="radio" name="status" value="1" {% if params['model']['status'] == '1'%}checked{% endif %}/>Active
           <input type="radio" name="status" value="0" {% if params['model']['status'] == '0'%}checked{% endif %}/>Unactive
         </li>
         <br>
         <li>
           <input type="submit" name = "create" value="Edit user" />
         </li>
       </fieldset>
     </ul>
    </form>
  </main>
</body>
</html>
