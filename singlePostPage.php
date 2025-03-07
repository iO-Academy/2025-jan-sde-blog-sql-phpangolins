<?php
declare(strict_types=1);
session_start();
require_once 'src/Services/NavBarService.php';
require_once 'src/Services/PostServices.php';
require_once 'src/Models/PostsModel.php';
require_once 'src/Services/DatabaseConnectionServices.php';

$db = DatabaseConnectionServices::connect();
$posts = new PostsModel($db);

if (isset($_GET['id'])) {
    $pageId = intval($_GET['id']);
} else {
    throw new Exception('$_GET superglobal doesnt return any value -');
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
    <title><?= $pageTitle; ?></title>
</head>
<body>
    <?php
        echo NavBarService::displayNavBar();
        echo PostServices::displaySinglePost($postToDisplay);
    ?>
</body>
</html>
