<?php

//Inside service method to display()
//Form with username input and password input and a login submit input
//method='post'
//Make sure we use the 'name' tribute for $_POST super global

declare(strict_types=1);

$db = new PDO(dsn:'mysql:host=db;dbname=blog-project', username:'root', password:'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


class LoginFormService
{
    static public function displayFunction()
    {


    }


}