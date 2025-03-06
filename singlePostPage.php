<?php
declare(strict_types=1);

session_start();
require_once 'src/Services/NavBarService.php';
//    require_once 'src/Entities/PostEntity.php';
require_once 'src/Services/PostServices.php';
require_once 'src/Models/PostsModel.php';
require_once 'src/Services/DatabaseConnectionServices.php';
$db = DatabaseConnectionServices::connect();
$posts = new PostsModel($db);
$pageId = intval($_GET['id']);

echo '<pre>';
var_dump($posts->singlePagePost($pageId));
echo '</pre>';

echo PostServices::displaySinglePost($posts->singlePagePost($pageId));



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

</body>
</html>
