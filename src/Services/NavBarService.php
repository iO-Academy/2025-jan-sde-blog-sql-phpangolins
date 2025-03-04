<?php

class NavBarService
{
    static public function displayNavBar(): string
    {
        $output = '<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">';
        $output .= '<a href="index.php"><h1 class="text-5xl">Blog</h1></a>';
        $output .= '<div class="flex gap-5">';
        $output .= '<a href="addPost.php">Create Post</a>';

        if ($_SESSION['loggedIn'] === false) {
            $output .= '<a href="login.php">Login</a>';
            $output .= '<a href="register.php">Register</a>';
        }
            $output .= '</div>';
            $output .= '</nav>';
            return $output;
    }

}
