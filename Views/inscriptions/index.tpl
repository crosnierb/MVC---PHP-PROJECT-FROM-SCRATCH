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
      <ul>
        <fieldset>
          <legend>Nav</legend>
          <ul>
            <li>
              Menu:
              <a href="/">Home</a>
              <a href="/connections">login</a>
              <a href="/inscriptions">inscription</a>
            </li>
          </ul>
        </ul>
      </fieldset>
    </nav>
  </header>
  <main>
    <form method="post" action="/inscriptions/new">
      <ul>
        <h1>Inscription form:</h1>
        {{ params['test'] }}
        {{ params['error']}}
        {{ params['error'][0] }}
        {{ params['error'][1] }}
        {{ params['error'][2] }}
        {{ params['error'][3] }}
        {{ params['success'] }}
        <li>
          <label for="name">Username:</label>
          <input type="text" pattern="[a-zA-Z]+.{2,10}"id="form-name" maxlength="10" required name="name" />
        </li><br>
        <li>
          <label for="email">Email:</label>
          <input type="email"  id="email" name="email" maxlength="255"required/>
        </li>
        <br>
        <li>
          <label for="password">Password:</label>
          <input type="password" pattern=".{3,10}" id="form-password" maxlength="10" required name="password" />
        </li>
        <br>
        <li>
          <label for="password_confirmation">Password Confirmation:</label>
          <input type="password" pattern=".{3,10}" id="form-password_confirmation" maxlength="10" required name="password_confirmation" />
        </li>
        <br>
        <li>
          <input type="submit" value="submit">
        </li>
      </ul>
    </form>
  </main>
  <footer>
  </footer>
</body>
</html>

<!-- <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../webroot/css/home.css">
        <title>home</title>
    </head>
    <body>
        <header>
            <div class="website-title">
                Coding Blog
            </div>

            <nav>
              <ul>
                <fieldset>
                  <legend>Nav</legend>
                  <ul>
                <li>
                  Menu:
                  <a href="/">Home</a>
                  <a href="/Defaults/login">login</a>
                  <a href="/Defaults/inscription">inscription</a>
                </li>
              </ul>
              </ul>
            </fieldset>
            </nav>

            <div class="nav">
                <ul id="navigation">
                    {% for item in navigation %}
                        <li><a href="{{ item.href }}">{{ item.caption }}</a></li>
                    {% endfor %}
                </ul>
            </div>
        </header>
        <div id="main">
            <div class="une">
                <div class="feature">
                    <div class="feature-intro">

                    </div>
                    <div class="feature-img">

                    </div>

                </div>
                <div class="grid">
                    <div class="grid-quarter">
                        <div class="grid-quarter-intro">

                        </div>
                        <div class="grid-quarter-img">

                        </div>
                    </div>
                    <div class="grid-quarter">
                        <div class="grid-quarter-intro">

                        </div>
                        <div class="grid-quarter-text">

                        </div>
                    </div>
                    <div class="grid-quarter">
                        <div class="grid-quarter-intro">

                        </div>
                        <div class="grid-quarter-text">

                        </div>
                    </div>
                    <div class="grid-quarter">
                        <div class="grid-quarter-intro">

                        </div>
                        <div class="grid-quarter-img">

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <footer>

        </footer>
    </body>
</html> -->
