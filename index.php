<?php
    declare(strict_types=1);
    require_once 'src/entities/PostEntity.php';
    require_once 'src/services/PostServices.php';
    require_once 'src/models/PostsModel.php';
    require_once 'src/services/DatabaseConnectionServices.php';
    $db = DatabaseConnectionServices::connect();
    $posts = new PostsModel($db);
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
        echo PostServices::displayHomepage($posts->getAll());
    ?>
</body>
</html>