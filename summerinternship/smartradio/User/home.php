<?php include('userServer.php') ?>
<?php
if (!isset($_SESSION['username'])) {
    header('location: /smartradio/User/register.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: /smartradio/User/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="container">
        <div class="card">
            <?php if (isset($_SESSION['username'])) : ?>
                <h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
                <a href="home.php?logout='1'" class="btn btn-outline-warning">Logout</a>
                <form action="home.php" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="message">Message :</label>
                            <textarea class="form-control" name="message" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="sendmessage">Send</button>
                    </div>
                </form>
                <p>Wanna Change Password? <a href="changepassword.php" class="btn btn-outline-danger">Click-Here</a></p>
            <?php endif ?>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>