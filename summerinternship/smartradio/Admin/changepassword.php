<?php include('adminServer.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="container">
        <section class="card">
            <div class="header">
                <h2>Update Password</h2>
            </div>
            <div class="alert alert-danger">
                <?php include('errors.php') ?>
            </div>
            <div class="card-body">
                <form action="changepassword.php" method="POST">
                    <table class="table">
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
                            <td>
                                <button type="submit" name="change_password_admin" class="btn btn-warning">Update</button>
                            </td>
                        </tr>
                    </table>
            </div>
            <p>Wanna Go Back? <a href="/smartradio/Admin/home.php" class="btn btn-outline-info">Click-Here</a></p>
            </form>
        </section>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>