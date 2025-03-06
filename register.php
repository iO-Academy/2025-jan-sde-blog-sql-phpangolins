<?php
declare(strict_types=1);

require_once 'src/Services/NavBarService.php';
require_once 'src/Services/DatabaseConnectionServices.php';
require_once 'src/models/UsersModel.php';
require_once 'src/Services/RegisterService.php';
session_start();

if (isset($_POST['submitted'])) {
    $db = DatabaseConnectionServices::connect();
    $user = new UsersModel($db);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (
        RegisterService::validateUsername($username)
        && RegisterService::validateEmail($email)
        && RegisterService::validatePassword($password)
        && !$user->checkUsernameExists($username)
        && !$user->checkEmailExists($email)) {
            $user->addUser($username, $email, $password);
            $_SESSION ['loggedIn'] = true;
            $_SESSION ['username'] = $username;
            header('Location:index.php');
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
    <title>Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
        echo NavBarService::displayNavBar();
    ?>
    <form method="POST" class="container lg:w-1/4 mx-auto flex flex-col p-8 bg-slate-200">
        <h2 class="text-3xl mb-4 text-center">Register</h2>
        <div class="mb-5">
            <label class="mb-3 block" for="username">Username:</label>
            <input class="w-full px-3 py-2 text-lg" type="text" id="username" name="username" />
            <?php
                if (isset($_POST['submitted']) && $user->registrationValidationCheckUsername($username) === false){
                    echo "<p class='text-red-600'>Username already taken</p>";
                }
                if (isset($_POST['submitted']) && RegisterService::validateUsername($username) ===false){
                    echo "<p class='text-red-600'>username must be between 3 and 25 characters</p>";
                }
        ?>
        </div>
        <div class="mb-5">
            <label class="mb-3 block" for="email">Email:</label>
            <input class="w-full px-3 py-2 text-lg" type="text" id="email" name="email" />
            <?php
            if (isset($_POST['submitted']) && RegisterService::validateEmail($email) === false){
                echo "<p class='text-red-600'>Must be a valid email</p>";
            }
            if (isset($_POST['submitted']) && $user->registrationValidationCheckEmail($email) ===false){
                echo "<p class='text-red-600'>Email is already registered</p>";
            }
            ?>
        </div>
        <div class="mb-5">
            <label class="mb-3 block" for="password">Password:</label>
            <input class="w-full px-3 py-2 text-lg" type="password" id="password" name="password" />
            <?php
            if (isset($_POST['submitted']) && RegisterService::validatePassword($password) === false){
                echo '<p class="text-red-600">Password must be over 8 characters and not contain the word "password"</p>';
            }
            ?>
        </div>
        <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Register" name="submitted" />
    </form>
</body>
</html>