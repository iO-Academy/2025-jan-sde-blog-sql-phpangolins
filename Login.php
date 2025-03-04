<?php

require_once 'src/Services/LoginFormService.php';
require_once 'src/DatabaseConnectionServices.php';
require_once 'src/Models/UsersModel.php';

session_start();

$db = DatabaseConnectionServices::connect();
$user = new UsersModel($db);

if (!$user -> checkUser() === false)
{
    $_SESSION ['loggedIn'] = true;
    header('Location:index.php');
}


Echo '<pre>';
var_dump ($user -> checkUser());

echo LoginFormService::displayLoginForm();

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

</body>
</html>
