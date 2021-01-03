<?php include('userServer.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <center>
        <form action="changepassword.php" method="POST">
            <div class="header">
                <h1>Update User Password</h1>
            </div>
            <h3 class="error"><?php include('errors.php') ?></h3>
            <table class="container">
                <tr>
                    <th>
                        <b>Old Password :</b>
                    </th>
                    <td>
                        <input type="password" name="oldpassword" class="password">
                    </td>
                </tr>
                <tr>
                    <th>
                        <b>New Password :</b>
                    </th>
                    <td>
                        <input type="password" name="newpassword_1" class="password">
                    </td>
                <tr>
                    <th>
                        <b>Confirm New Password :</b>
                    </th>
                    <td>
                        <input type="password" name="newpassword_2" class="password">
                    </td>
                </tr>
                </tr>
                <tr>
                    <th></th>
                    <td colspan="2">
                        <button type="submit" name="change_password">Update</button>
                    </td>
                </tr>
            </table>
            <p>Wanna Go Back? <a href="/smartradio/User/index.php">Click-Here</a></p>
    </center>
    </form>
</body>

</html>