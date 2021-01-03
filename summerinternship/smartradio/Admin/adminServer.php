<?php
session_start();

// initializing variables
$adminname = "";
$email = "";

$errors = array();

// connecting database

$db = mysqli_connect('localhost', 'root', '', 'smartradio') or die('could not connect to database');

// register admins
if (isset($_POST['admin_register'])) {
    $adminname = @mysqli_real_escape_string($db, $_POST['adminname']);
    $email = @mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = @mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = @mysqli_real_escape_string($db, $_POST['password_2']);

    if (empty($adminname)) {
        array_push($errors, "adminname is required");
    }
    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "passwords are not matching");
    }

    // check existing user with same adminname

    $user_check_query = "SELECT * FROM admins WHERE adminname = '$adminname' or email = '$email' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
        if ($user['adminname'] === $adminname) {
            array_push($errors, "adminname already exists");
        }
        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }


    // register admins with no errors
    if (count($errors) === 0) {
        $password = md5($password_1); //password encryption
        $query = "INSERT INTO admins (adminname, email, password) VALUES('$adminname', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['adminname'] = $adminname;
        $_SESSION['success'] = "You are logged in";
        header('location: /smartradio/Admin/home.php');
    } else {
        array_push($errors, "you have errors some where");
    }
}
// login user
if (isset($_POST['login_admin'])) {
    $adminname = @mysqli_real_escape_string($db, $_POST['adminname']);
    $password = @mysqli_real_escape_string($db, $_POST['password_1']);

    if (empty($adminname)) {
        array_push($errors, "adminname is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }

    if (count($errors) === 0) {
        $password = md5($password);
        $query = "SELECT * FROM admins WHERE adminname='$adminname' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)) {
            $_SESSION['adminname'] = $adminname;
            $_SESSION['seccess'] = "logged in successfully";
            header('location: /smartradio/Admin/home.php');
        } else {
            array_push($errors, "wrong adminname or password try again");
        }
    } else {
        array_push($errors, "there is some error");
    }
}

//change password

if (isset($_POST['change_password_admin'])) {
    $user = $_SESSION['adminname'];
    if ($user) {
        if (isset($_POST['change_password_admin'])) {
            //check fields
            $oldpassword = @mysqli_real_escape_string($db, $_POST['oldpassword']);
            $newpassword_1 = @mysqli_real_escape_string($db, $_POST['newpassword_1']);
            $newpassword_2 = @mysqli_real_escape_string($db, $_POST['newpassword_2']);
            $query = "SELECT password FROM admins WHERE adminname= '$user'";
            $results = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($results);
            $oldpasswordddb = $row['password'];
            $oldpass = md5($oldpassword);
            if ($oldpass === $oldpasswordddb) {
                if ($newpassword_1 === $newpassword_2) {
                    $newpassword = md5($newpassword_1);
                    $updatequery = "UPDATE admins SET password='$newpassword' WHERE adminname='$user'";
                    $updateresults = mysqli_query($db, $updatequery);
                    session_destroy();
                    array_push($errors, "your password have been changed");
                    header('location: /smartradio/Admin/login.php');
                } else {
                    array_push($errors, "new passwords are not matching");
                }
            } else {
                array_push($errors, "type old password correct");
            }
        } else {
            header('location: /smartradio/Admin/changepassword.php');
            array_push($errors, "there are errors");
        }
    } else {
        header('location: /smartradio/Admin/login.php');
    }
}

// delete message
if (isset($_POST['deltemessage'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM messages WHERE id='$id'";
    $results = mysqli_query($db, $query);
    if ($results) {
        array_push($errors, "Message has been deleted");
    } else {
        array_push($errors, "message is not deleted");
    }
}

// sending a message
if (isset($_POST['sendmessage'])) {
    $user = $_SESSION['adminname'];
    $message = @mysqli_real_escape_string($db, $_POST['message']);
    if (empty($message)) {
        array_push($errors, "Message should not be empty");
    }
    if (count($errors) === 0) {
        $query = "INSERT INTO messages(username, message) VALUES ('$user', '$message')";
        mysqli_query($db, $query);
    }
}
