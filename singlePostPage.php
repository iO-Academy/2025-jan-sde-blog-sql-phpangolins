<?php
declare(strict_types=1);
session_start();
require_once 'src/Services/NavBarService.php';
require_once 'src/Services/PostServices.php';
require_once 'src/Models/PostsModel.php';
require_once 'src/Services/DatabaseConnectionServices.php';
require_once 'src/Services/CommentFormService.php';
require_once 'src/Models/CommentsModel.php';
require_once 'src/Services/DisplayCommentsService.php';

$db = DatabaseConnectionServices::connect();
$posts = new PostsModel($db);
$commentsModel = new CommentsModel($db);

if (isset($_GET['id'])) {
    $pageId = intval($_GET['id']);
} else {
    throw new Exception('$_GET superglobal doesnt return any value -');
}

$postToDisplay = $posts->singlePagePost($pageId);
$pageTitle = $postToDisplay->getTitle();

$showSuccessMessage = false;
$showErrorMessage = false;

if(isset($_POST['comment_content'])) {
    // store content of comment form in variable
    $commentContent = $_POST['comment_content'];
    // return a boolean depending on if comment meets validation requirements
    $commentValidation = CommentFormService::validateCommentContent($commentContent);
    if ($commentValidation) {
        $showSuccessMessage = $commentsModel->insertCommentIntoTable($commentContent, $pageId, $_SESSION['user_id']);
    } else {
        $showErrorMessage = true;
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?php echo $pageTitle ?></title>
</head>
<body>
    <?php
        echo NavBarService::displayNavBar();
        echo PostServices::displaySinglePost($postToDisplay);
        if (isset($_SESSION['loggedIn'])) {
            echo CommentFormService::displayForm();
        }
        if ($showSuccessMessage) {
            echo CommentFormService::successMessage();
        }
        if ($showErrorMessage) {
            echo CommentFormService::errorMessage();
        }

        $commentsArray = $commentsModel->commentsThatBelongToPost($pageId);
        echo DisplayCommentsService::displayAll($commentsArray);

    ?>
</body>
</html>
