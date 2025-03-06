<?php
declare(strict_types=1);

class DisplayCommentsService
{
    static public function displayAll(array $comments) : string
    {
        $output = '<section class="container md:w-1/2 mx-auto mt-5 mb-10">';

        foreach ($comments as $comment) {

            $date = date_create($comment->getDate());

            $output .= '<div class="p-8 border border-solid rounded-md bg-slate-200 my-4">';
            $output .= '<div class="text-2xl mb-3">' . $comment->getUsername() . ' - ' . date_format($date, 'd/m/Y') . '</div>';
            $output .= '<p>' . $comment->getComment() . '</p>';
            $output .= '</div>';

        }
        $output .= '</section>';

        return $output;
    }
}
