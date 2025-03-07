<?php
declare(strict_types=1);
session_start();
require_once 'src/Services/DatabaseConnectionServices.php';
require_once 'src/Models/PostsModel.php';
require_once 'src/Models/LikesDislikesModel.php';

$db = DatabaseConnectionServices::connect();
$postsModel = new PostsModel($db);
$likesDislikesModel = new LikesDislikesModel($db);
//returns false or entity
$valToCheck = $likesDislikesModel->checkUserHasLikedPost($_SESSION['user_id'], intval($_SESSION['post_id']));

if (gettype($valToCheck) != "boolean") {
    if ($valToCheck->getHasLiked() == 0 && $valToCheck->getHasDisliked() == 0) {
        // add like to post
        $postsModel->addDislike(intval($_SESSION['post_id']));
        // need to add logic to change has liked in likes dislikes model
        $likesDislikesModel->updateHasDisliked($_SESSION['user_id'], intval($_SESSION['post_id']), 1);
    }

    // user has liked and wants to change to dislike
    if ($valToCheck->getHasDisliked() == 0 && $valToCheck->getHasLiked() == 1) {

        $postsModel->removeLike(intval($_SESSION['post_id']));
        $postsModel->addDislike(intval($_SESSION['post_id']));
        $likesDislikesModel->updateHasDisliked($_SESSION['user_id'], intval($_SESSION['post_id']), 1);
        $likesDislikesModel->updateHasLiked($_SESSION['user_id'], intval($_SESSION['post_id']),  0);
    }

} else {
    $likesDislikesModel->addHasDisliked($_SESSION['user_id'], intval($_SESSION['post_id']), 0, 1);
}

header("location: singlePostPage.php?id=" . $_SESSION['post_id']);