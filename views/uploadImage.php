<html>
    <head>
        <title>Change Your Profile Picture</title>
        <link type='text/css' rel='stylesheet' href='views/userprofile.css?<?php /*I found this piece online(stackoverflow)to help my CSS work properly*/echo time(); ?>'>
    </head>
   <body>
      
      <form action="registration.php" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="action" value="uploadNewImage"/>
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
       
       <a class="buttons" href="registration.php?action=showUserProfile">Go To Profile</a></p>
      
   </body>
</html>