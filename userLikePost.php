<?php
declare(strict_types=1);
session_start();

require_once 'src/Services/DatabaseConnectionServices.php';
require_once 'src/Models/PostsModel.php';
require_once 'src/Models/LikesDislikesModel.php';


$db = DatabaseConnectionServices::connect();
$postsModel = new PostsModel($db);
$likesDislikesModel = new LikesDislikesModel($db);

//var_dump($_SESSION);
echo "<pre>";

var_dump($_SESSION);
var_dump(intval($_SESSION['post_id']));

//returns false or entity
$valToCheck = $likesDislikesModel->checkUserHasLikedPost($_SESSION['user_id'], intval($_SESSION['post_id']));
var_dump($valToCheck);
// if it isn't false run code
if (gettype($valToCheck) != "boolean"){
    var_dump(gettype($valToCheck));
    // if user hasn't liked post
    if ($valToCheck->getHasLiked() == 0){
        var_dump($valToCheck->getHasLiked());
        // add like to post
        $postsModel->addLike(intval($_SESSION['post_id']));
        // need to add logic to change has liked in likes dislikes model
        $likesDislikesModel->updateHasLiked($_SESSION['user_id'], intval($_SESSION['post_id']));
    }
}

//header("location: singlePostPage.php?id=" . $_SESSION['post_id']);