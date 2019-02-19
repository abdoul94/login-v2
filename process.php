<?php
session_start();
$submit = $_POST['submit'];

    include_once('connection.php');
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $sql = "SELECT id,username,password FROM users where username = '$username' LIMIT 1";
    $query = mysqli_query($db, $sql);
    if($query) {
        $row = mysqli_fetch_row($query);
        $userId= $row[0];
        $dbUserName = $row[1];
        $dbPassword = $row[2];
    }
    if($username == $dbUserName && $password == $dbPassword) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $userId;
        header('Location: user.php');
    }
    else {
        echo "<b><i>Incorrect credentials</i><b>";

    }


?>