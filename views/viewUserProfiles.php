<html>
    <head>
        <meta charset="UTF-8">
        <title>Team Quebec</title>
<!--        Testing the file structure after a commit-->
        <link href="views/register.css?<?php /*I found this piece online(stackoverflow)to help my CSS work properly*/echo time(); ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <div id="formWrapper">
            <h1>Browse Users</h1><br>
            <nav>   
                <table>
                    
                    
                    <thead>
                    <th>Username</th>
                    <th>Profile Link</th>
                    </thead>
                    <?php foreach ($allUsers as $user) {?>
                <tbody>
                    <tr>    
                        <td><?php echo $user['userName']; ?></td>
                      <td><form action="registration.php" method="post">
                <input type="hidden" name="action"
                       value="visitUserProfile">
                <input type="submit" value="Visit Profile" id="visit" class="buttons"></form></td> 
                    </tr><?php } ?> 
                </tbody>
                </table>
                <label>&nbsp;</label>
        
            </nav>
            </div>
        </main>
    </body>
</html>
