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
            <h1>All users available</h1><br>
            <nav>
                <table>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>UserName</th>
                            <th>Email Address</th>
                        </tr>
                    </thead>
                    
                    <?php foreach ($allUsers as $user) {?>
                    
                <tbody>
                    <tr>    
                        <td><?php echo $user['firstName']; ?></td>
                      <td><?php echo $user['lastName']; ?></td>     
                      <td><?php echo $user['userName']; ?></td> 
                      <td><?php echo $user['email']; ?></td> 
                    </tr><?php } ?> 
                </tbody>
                </table>
                <label>&nbsp;</label>
         <a href="registration.php" name="action" value="showRegistration" class="buttons" id="btnSubmit">Registration</a><br><br><br>
            </nav>
            </div>
        </main>
    </body>
</html>
