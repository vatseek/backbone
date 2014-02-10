<?php
require 'Slim/Slim.php';

$app = new Slim();

$app->get('/bookmark', 'getBookmarks');
$app->get('/folder/:id', 'getFolders');

$app->run();


function getBookmarks()
{
    $sql = "select * FROM `folder` WHERE user_id = '0'; ";
    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        echo json_encode($items);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function getFolders($folderId)
{
    $sql = "select * FROM `folder` WHERE user_id = '0' AND parent_id = '{$folderId}';";
    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        echo json_encode($items);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function getConnection() {
    $dbhost="127.0.0.1";
    $dbuser="user";
    $dbpass="";
    $dbname="bone_co";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}