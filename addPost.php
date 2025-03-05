<?php

declare(strict_types=1);

require_once 'src/Services/NavBarService.php';
require_once 'src/Models/AddPostsModel.php';
require_once 'src/Services/DatabaseConnectionServices.php';

echo NavBarService::displayNavBar();

$titleError = false;
$contentShortError = false;
$contentLongError = false;

if (isset($_POST['submitted'])) {
    $db = DatabaseConnectionServices::connect();
    $addPost = new AddPostsModel($db);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $contentLength = strlen($content);

    if (strlen($title) > 30) {
        $titleError = true;
    } elseif ($contentLength < 50) {
        $contentShortError = true;
    } elseif ($contentLength > 1001) {
        $contentLongError = true;
    } else {
        $addPost->addPost($title, $content);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">

<form method="POST" class="container lg:w-3/4 mx-auto flex flex-col p-8 bg-slate-200">
    <h2 class="text-3xl mb-4 text-center">Create new post</h2>

    <div class="flex flex-col sm:flex-row mb-5 gap-5">
        <div class="w-full sm:w-2/3">
            <label class="mb-3 block" for="title">Title:</label>
            <input name="title" class="w-full px-3 py-2 text-lg" type="text" id="title" />
            <?php
            if ($titleError = true) {
                echo 'Title is too long! 30 characters max';
            }
            ?>
        </div>

<!--        <div class="w-full sm:w-1/3">-->
<!--            <label for="category" class="mb-3 block">Category:</label>-->
<!--            <select class="w-full px-3 py-[10.5px] text-lg bg-white" id="category">-->
<!--                <option>News</option>-->
<!--                <option>Gaming</option>-->
<!--                <option>Films</option>-->
<!--                <option>TV</option>-->
<!--                <option>Science and Nature</option>-->
<!--            </select>-->
<!--        </div>-->
<!--    </div>-->

    <div class="mb-5">
        <label class="mb-3 block" for="content">Content:</label>
        <textarea name="content" class="w-full" id="content" rows="9"></textarea>
        <?php

        if ($contentShortError = true) {
            echo 'Content is too short! 50 characters min ';
        }
        if ($contentLongError = true) {
            echo 'Content is too long! 1000 characters max';
        }
        ?>
    </div>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" name="submitted" type="submit" value="Create Post" />
</form>

</body>
</html>