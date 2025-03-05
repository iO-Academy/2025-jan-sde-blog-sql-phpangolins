<?php
declare(strict_types=1);
session_start();
require_once 'src/Services/NavBarService.php';
require_once 'src/Services/DatabaseConnectionServices.php';
require_once 'src/models/UsersModel.php';
require_once 'src/Services/RegisterService.php';

//$displayError = false;

if (isset($_POST['submitted'])) {

    $db = DatabaseConnectionServices::connect();
    $user = new UsersModel($db);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

//    var_dump( RegisterService::validateUsername($username));
//    var_dump( RegisterService::validateEmail($email));
//    var_dump( RegisterService::validatePassword($password));

    var_dump($user->registrationValidationCheckUsername($username));
    var_dump($user->registrationValidationCheckEmail($email));

    if (
            RegisterService::validateUsername($username)
        && RegisterService::validateEmail($email)
        && RegisterService::validatePassword($password)
        && $user->registrationValidationCheckUsername($username)
        && $user->registrationValidationCheckEmail($email))
    {
        $user->addUser($username, $email, $password);
    }
    else
    {
        echo "<p>Didn't work</p>";
    }


//    if ($user -> checkUser($email, $password) !== false) {
//        $displayError = false;
//        $_SESSION ['loggedIn'] = true;
//        header('Location:index.php');
//    }
//    $displayError = true;
}

var_dump($_POST);
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
        </div>

        <div class="mb-5">
            <label class="mb-3 block" for="email">Email:</label>
            <input class="w-full px-3 py-2 text-lg" type="email" id="email" name="email" />
        </div>

        <div class="mb-5">
            <label class="mb-3 block" for="password">Password:</label>
            <input class="w-full px-3 py-2 text-lg" type="password" id="password" name="password" />
        </div>

        <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Register" name="submitted" />
    </form>
</body>
</html>