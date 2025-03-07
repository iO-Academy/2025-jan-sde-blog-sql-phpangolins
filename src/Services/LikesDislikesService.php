<?php
declare(strict_types=1);

class LikesDislikesService
{
    static public function displayButtons(bool $loggedIn) : string
    {
        $output = '';

        if ($loggedIn) {
            $output .= '<a class="px-3 py-2 mt-4 text-lg bg-green-300 hover:bg-green-400 hover:text-white transition inline-block rounded-sm" href="userLikePost.php">Like</a>';
            $output .= '<a class="px-3 py-2 mt-4 text-lg bg-red-300 hover:bg-red-400 hover:text-white transition inline-block rounded-sm" href="userDislikePost.php">Dislike</a>';
        } else {
            $output .= '<a class="px-3 py-2 mt-4 text-lg bg-green-300 hover:bg-green-400 hover:text-white transition inline-block rounded-sm" href="login.php">Like</a>';
            $output .= '<a class="px-3 py-2 mt-4 text-lg bg-red-300 hover:bg-red-400 hover:text-white transition inline-block rounded-sm" href="login.php">Dislike</a>';
        }

        return $output;
    }
}