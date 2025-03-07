<?php
    declare(strict_types=1);
    session_start();

    require_once 'src/Services/NavBarService.php';
    require_once 'src/Services/PostServices.php';
    require_once 'src/Models/PostsModel.php';
    require_once 'src/Services/DatabaseConnectionServices.php';
    $db = DatabaseConnectionServices::connect();
    $posts = new PostsModel($db);
    var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
        echo NavBarService::displayNavBar();
        echo PostServices::displayHomepage($posts->getAll());
    ?>
</body>
</html>