<?php
session_start();

// initializing Variables
$username = "";
$email = "";

// for error messages
$errors = array();

// connecting to db
$db = mysqli_connect('localhost', 'root', '', 'smartradio') or die('could not connect to database');

if (isset($_POST['user_register'])) {
    // setting the local variables
    $username = @mysqli_real_escape_string($db, $_POST['username']);
    $email = @mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = @mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = @mysqli_real_escape_string($db, $_POST['password_2']);

    // checking if they are not empty
    if (empty($username)) {
        array_push($errors, "username is required");
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

    // checking for existing username and email in database
    $user_check_query = "SELECT * FROM users WHERE username='$username' or email='$email' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "username already exits try a different one");
        }
        if ($user['email'] === $email) {
            array_push($errors, "email already exits try a different one");
        }
    }

    if (count($errors) === 0) {
        $password = md5($password_1);
        $query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "you are logged in";
        header('location: /smartradio/User/home.php');
    }
}

// login user
if (isset($_POST['user_login'])) {
    $username = @mysqli_real_escape_string($db, $_POST['username']);
    $password = @mysqli_real_escape_string($db, $_POST['password_1']);

    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }

    if (count($errors) === 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)) {
            $_SESSION['username'] = $username;
            $_SESSION['seccess'] = "logged in successfully";
            header('location: /smartradio/User/home.php');
        } else {
            array_push($errors, "wrong username or password try again");
        }
    }
}

//change password
if (isset($_POST['change_password'])) {
    $user = $_SESSION['username'];
    if ($user) {
        if (isset($_POST['change_password'])) {
            //check fields
            $oldpassword = @mysqli_real_escape_string($db, $_POST['oldpassword']);
            $newpassword_1 = @mysqli_real_escape_string($db, $_POST['newpassword_1']);
            $newpassword_2 = @mysqli_real_escape_string($db, $_POST['newpassword_2']);
            $query = "SELECT password FROM users WHERE username= '$user'";
            $results = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($results);
            $oldpasswordddb = $row['password'];
            $oldpass = md5($oldpassword);
            if ($oldpass === $oldpasswordddb) {
                if ($newpassword_1 === $newpassword_2) {
                    $newpassword = md5($newpassword_1);
                    $updatequery = "UPDATE users SET password='$newpassword' WHERE username='$user'";
                    $updateresults = mysqli_query($db, $updatequery);
                    session_destroy();
                    array_push($errors, "your password have been changed");
                    header('location: /smartradio/User/login.php');
                } else {
                    array_push($errors, "new passwords are not matching");
                }
            } else {
                array_push($errors, "type old password correct");
            }
        } else {
            header('location: /smartradio/User/changepassword.php');
        }
    } else {
        header('location: /smartradio/User/login.php');
    }
}

// sending message
if (isset($_POST['sendmessage'])) {
    $user = $_SESSION['username'];
    $message = @mysqli_real_escape_string($db, $_POST['message']);
    if (empty($message)) {
        array_push($errors, "Message should not be empty");
    }
    if (count($errors) === 0) {
        $query = "INSERT INTO messages(username, message) VALUES ('$user', '$message')";
        mysqli_query($db, $query);
    }
}
