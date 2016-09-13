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
    <h1>My Administration view</h1>
    test: {{ params["test"] }}<br>
    id : {{ params["session"]["user_id"] }}<br>
    group: {{ params["session"]["user_group"] }}<br>
    status : {{ params["session"]["user_status"] }}<br>
    name : {{ params["session"]["user_name"] }}<br>
    email: {{ params["session"]["user_email"] }}<br>

    {% block body %}
  <!-- New User -->
  <a href="/users/new">New User</a>
  <!-- Table users -->
   <table>
     <thead>
       <tr>
         <th>Id</th>
         <th>Username</th>
         <th>Admin</th>
         <th>Actions</th>
       </tr>
     </thead>
     <tbody>
         {% for user in params["model"] %}
         <tr>
             <td>{{user["id"]}}</td>
             <td>{{user["username"]}}</td>
             <td>{{user["group"]}}</td>
             <td>
               <a href="/users/show/{{user["id"]}}">Show</a>
               <a href="/users/edit/{{user["id"]}}">Modify</a>
               <a href="/users/delete/{{user["id"]}}">Delete</a>
             </td>
             </tr>
         {% endfor %}

     </tbody>
   </table>
   {% endblock %}
  </main>
</body>
</html>
