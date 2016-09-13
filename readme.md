I. List
------------
A. core.php
    1. include model, controller's classes and views, css' files ===== ok

B. htaccess
    1.  The only page called by the user must be index.php

    2.  The webroot folder is the web root of your site.
        It is the only directory that can be accessed by the user.
        It's then up to the index.php file to make the necessary includes

        AuthName "Member's Area Name"
        AuthUserFile /path/to/password/file/.htpasswd
        AuthType Basic
        require valid-user
        ErrorDocument 401 /error_pages/401.html
        AddHandler server-parsed .html


    3.  Check index.php

C. Templates
    1.  Sessions - cookies

II. Comments
------------
