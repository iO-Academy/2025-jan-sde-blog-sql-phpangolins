<?php

//Inside service method to display()
//Form with username input and password input and a login submit input
//method='post'
//Make sure we use the 'name' tribute for $_POST super global

declare(strict_types=1);

class LoginFormService
{
    static public function displayLoginForm()
    {
        $output = '<form method="POST" class="container lg:w-1/4 mx-auto flex flex-col p-8 bg-slate-200">';
        $output .= '<h2 class="text-3xl mb-4 text-center">Login</h2>';
        $output .= '<div class="mb-5">';
        $output .= '<label class="mb-3 block" for="email">Email:</label>';
        $output .= '<input name="email" class="w-full px-3 py-2 text-lg" type="text" id="email" />';
        $output .= '</div>';
        $output .= '<div class="mb-5">';
        $output .= '<label class="mb-3 block" for="password">Password:</label>';
        $output .= '<input name="password" class="w-full px-3 py-2 text-lg" type="password" id="password" />';
        $output .= ' </div>';
        $output .= '<input name="submitted" class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Login" />';
        $output .= '</form>';
        return $output;
    }


}