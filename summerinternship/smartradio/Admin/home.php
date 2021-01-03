<?php include('adminServer.php') ?>
<?php

if (!isset($_SESSION['adminname'])) {
    $_SESSION['msg'] = "You must login to view this page";
    header('location: /smartradio/Admin/login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['adminname']);
    header('location: /smartradio/Admin/login.php');
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
            <?php
            if (isset($_SESSION['adminname'])) : ?>
                <h3>Welcome <strong><?php echo $_SESSION['adminname']; ?></strong></h3>
                <p><a href="home.php?logout='1'" class="btn btn-outline-warning">Logout</a></p>
                <p>Wanna Change Password? <a href="changepassword.php" class="btn btn-outline-danger">Click-Here ...</a></p>
                <p>Wanna Send a Message? <button class="btn btn-outline-info send_message">Click-Here</button></p>
                <div class="alert alert-warning">
                    <?php include('errors.php') ?>
                </div>
                <div class="modal fade" id="deletemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Message</h5>
                            </div>
                            <form action="home.php" method="post">
                                <div class="model-body">
                                    <input type="hidden" name="delete_id" id="delete_id">
                                    <h3>you are about to delete the message</h3>
                                </div>
                                <div class="model-footer">
                                    <button type="submit" name="deltemessage" class="btn btn-danger">Delete it</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deletemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Message</h5>
                            </div>
                            <form action="home.php" method="post">
                                <div class="model-body">
                                    <input type="hidden" name="delete_id" id="delete_id">
                                    <h3>you are about to delete the message</h3>
                                </div>
                                <div class="model-footer">
                                    <button type="submit" name="deltemessage" class="btn btn-danger">Delete it</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                $query = "SELECT * FROM messages";
                $results = mysqli_query($db, $query);
                ?>
                <br>
                <table class="table table-striped table-info">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>messages</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <?php
                    if ($results) {
                        foreach ($results as $result) {
                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['username'] ?></td>
                                    <td><?php echo $result['message'] ?></td>
                                    <td><button type="submit" class="btn btn-danger mx-3 delbtn" name="del_message">Delete</button><button type="submit" class="btn btn-primary play_msg">Play</button></td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    } else {
                        array_push($errors, "No Record Found");
                    }
                    ?>
                </table>
            <?php endif ?>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.send_message').on('click', function() {
                $('#messagemodel').modal('show');
            });
        });
        $(document).ready(function() {
            $('.play_msg').on('click', function() {
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                var text = (data[2]);
                readOut(text);
            });
        });

        function readOut(message) {
            const speech = new SpeechSynthesisUtterance();
            speech.text = message;
            speech.volume = 1;
            speech.rate = 1;
            speech.pitch = 1;
            window.SpeechSynthesis.speak(speech);
        }
        $(document).ready(function() {
            $('.delbtn').on('click', function() {
                $('#deletemodel').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#delete_id').val(data[0]);
            });
        });
    </script>
</body>

</html>