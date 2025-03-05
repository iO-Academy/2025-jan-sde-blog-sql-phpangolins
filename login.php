<?php

require_once 'src/Services/DatabaseConnectionServices.php';
require_once 'src/Models/UsersModel.php';
require_once 'src/Services/NavBarService.php';

session_start();

$db = DatabaseConnectionServices::connect();
$user = new UsersModel($db);
$displayError = false;

if (isset($_POST['submitted'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user -> checkUser($email, $password) !== false) {
        $displayError = false;
        $_SESSION ['loggedIn'] = true;
        header('Location:index.php');
    }
    $displayError = true;
}

echo NavBarService::displayNavBar();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <form method="POST" class="container lg:w-1/4 mx-auto flex flex-col p-8 bg-slate-200">
        <h2 class="text-3xl mb-4 text-center">Login</h2>
        <div class="mb-5">
            <label class="mb-3 block" for="email">Email:</label>
            <input name="email" class="w-full px-3 py-2 text-lg" type="text" id="email" />
        </div>
        <div class="mb-5">
            <label class="mb-3 block" for="password">Password:</label>
            <input name="password" class="w-full px-3 py-2 text-lg" type="password" id="password" />
        </div>
        <?php
            if ($displayError) {
                echo '<p>Email or password are incorrect</p>';
            }
        ?>
        <input name="submitted" class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Login" />
    </form>

</body>
</html>