<?php
session_start();
require_once ("connector.php");
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
if(!isset($_GET['id'])){
    header("Location: index.php");
}
$userData = $db->users->findOne(array('_id'=> $_SESSION['user']));
$profile_id  = $_GET['id'];
$profileData = $db->users->findOne(array('_id'=> new MongoDB\BSON\ObjectId("$profile_id")));
function get_recent_tweets($db){
    $id = $_GET['id'];
    $result = $db->twitters->find(array('authorId' => new \MongoDB\BSON\ObjectId("$id")));
    $recent_tweets = iterator_to_array($result) ;
    return $recent_tweets;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <?php include("header.php");  ?>
    <div>
        <?php
        $recent_tweets = get_recent_tweets($db);
        foreach($recent_tweets as $tweet){
            echo "<p><a href='profile.php?id='".$tweet['authorId'].'">'.$tweet['authorName']."</a></p>";
            echo "<p>".$tweet['body']."</p>";
            echo "<p>".$tweet['created']."</p>";
            echo "<hr>";
        }
        ?>
    </div>
</body>
</html>
