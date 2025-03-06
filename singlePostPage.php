<?php
declare(strict_types=1);
session_start();
require_once 'src/Services/NavBarService.php';
require_once 'src/Services/PostServices.php';
require_once 'src/Models/PostsModel.php';
require_once 'src/Services/DatabaseConnectionServices.php';
require_once 'src/Services/CommentFormService.php';

$db = DatabaseConnectionServices::connect();
$posts = new PostsModel($db);

if (isset($_GET['id'])) {
    $pageId = intval($_GET['id']);
} else {
    throw new Exception('$_GET superglobal doesnt return any value -');
}

var_dump($_SESSION);

$successMessage = false;
$errorMessage = false;

if(isset($_POST['comment_content'])) {
    // store content of comment form in variable
    $commentContent = $_POST['comment_content'];
    var_dump($commentContent);
    // return a boolean depending on if comment meets validation requirements
    $commentValidation = CommentFormService::validateCommentContent($commentContent);
    var_dump($commentValidation);

    if ($commentValidation) {
        $successMessage = true;
        $errorMessage = false;
    } else {
        $errorMessage = true;
        $successMessage = false;
    }

}

$postToDisplay = $posts->singlePagePost($pageId);
$pageTitle = $postToDisplay->getTitle();
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
        if ($_SESSION['loggedIn']) {
            echo CommentFormService::displayForm();
        }
        if ($successMessage) {
            echo CommentFormService::successMessage();
        }
        if ($errorMessage) {
            echo CommentFormService::errorMessage();
        }
    ?>
</body>
</html>
