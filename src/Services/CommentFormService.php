<?php

declare(strict_types=1);

class CommentFormService
{
    static public function displayForm() : string
    {

        $output = ' <section class="container md:w-1/2 mx-auto mt-5">';
        $output .= '<form method="post" class="p-8 border border-solid rounded-md bg-slate-200">';
        $output .= '<div class="mb-5">';
        $output .= '<label class="mb-3 block" for="content">Comment:</label>';
        $output .= '<textarea class="w-full" id="content" name="comment_content" rows="5"></textarea>';
        $output .= '</div>';
        $output .= '<input class="px-3 py-2 mt-4 cursor-pointer text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Post Comment" />';
        $output .= '</form>';
        $output .= '</section>';
        return $output;

    }

    static public function validateCommentContent(string $commentContent) : bool
    {
        if (strlen($commentContent) >= 10 && strlen($commentContent) <= 200) {
            return true;
        }
        return false;
    }

    static public function successMessage() : string
    {
        return '<p class="text-center text-green-800">Your comment has been posted successfully.</p>';
    }

    static public function errorMessage() : string
    {
        return '<p class="text-center text-red-500">Your comment could not be posted. <br /> Your comment was under 10 characters or over 200 characters</p>';
    }
}









