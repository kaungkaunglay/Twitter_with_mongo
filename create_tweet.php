<?php
session_start();
require_once ("connector.php");

if(!isset($_GET['body'])){
    exit();
}
$user_id =  $_SESSION['user'];
$userData = $db->users->findOne(array('_id' => $user_id));
$body  = $_GET['body'];
$date  = date('Y-m-d H:i:s');
$db->twitters->insertOne(array('authorId' => $user_id, 'authorName' => $userData['username'], 'body' => $body, 'created' => date('Y-m-d')));
header('Location: home.php');