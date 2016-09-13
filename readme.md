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


    3.  The function in index.php check the URI on each call for the dispatcher

    4.  The dispatcher.php recept the URI and call the Router.php with the url.	

    5.  The Router.php parse the url, verify and return they names of the controller, the 	
	methode.

    6.   The dispatcher.php call the controller and the function.


C. Templates
    1.  Sessions - cookies

II. Comments
------------

I'm use This From Scratch FrameWork For my CV SiteWeb on www.crosnierb.com
