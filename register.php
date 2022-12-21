<?php
session_start();
require_once("connector.php");
if(isset($_SESSION['user'])){
    header("Location: home.php");
}
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $result = $db->users->insertOne(array('username' => $username, $password => $password));
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<form action="register.php" method="post">
    <fieldset>
        <label for="username">Username: </label><input type="text" name="username"><br>
        <label for="password">Password: </label><input type="password" name="password"><br>
        <input type="submit" value="Sign up">
    </fieldset>
</form>
<a href="index.php">Login Here</a>
</body>
</html>