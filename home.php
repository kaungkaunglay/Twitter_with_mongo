<?php
session_start();
require_once "connector.php";
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
if(isset($_POST['submit'])){
    $body =  htmlspecialchars($_POST['body']);
    header("Location: create_tweet.php?body=".$body);
}
$userData = $db->users->findOne(array('_id' => $_SESSION['user']));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include('header.php'); ?>
<form action="home.php" method="post">
    <fieldset >
        <label for="tweet">What's happening?</label> <br>
        <textarea name="body" id="" cols="50" rows="5"></textarea><br>
        <input name="submit" type="submit" value="Tweet">
    </fieldset>
</form>
</body>
</html>