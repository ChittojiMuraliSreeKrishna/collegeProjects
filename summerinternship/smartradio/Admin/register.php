<?php include('adminServer.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="container">
        <div class="card">
            <div class="card-title">
                <h2 class="mx-auto">Welcome to Admin Registration Page</h2>
            </div>
            <div class="alert alert-warning">
                <?php include('errors.php') ?>
            </div>
            <div class="card-body">
                <form action="register.php" method="post">
                    <div class="form-gruop">
                        <label for="adminname">AdminName :</label>
                        <input class="form-control" type="text" placeholder="Admin Name" name="adminname" id="adminname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input class="form-control" type="email" placeholder="Email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password_1">Password :</label>
                        <input class="form-control" type="password" placeholder="Password" name="password_1" id="password_1">
                    </div>
                    <div class="form-group">
                        <label for="password_2">Confirm Password :</label>
                        <input class="form-control" type="password" placeholder="Confirm Password" name="password_2" id="password_2">
                    </div>
                    <button class="btn btn-success" type="submit" name="admin_register">Register</button>
                </form>
            </div>
            <p>Already a user? <a href="/smartradio/Admin/login.php" class="btn btn-outline-info">Click-Here</a></p>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>