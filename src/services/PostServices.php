<?php
require_once 'src/entities/PostEntity.php';
class PostServices
{
    static public function displaySingleHomepage(PostEntity $post): string
    {
        $date = date_create($post->getDateTime());
        $outcome = '';

        $outcome .= "<article class='p-8 border border-solid rounded-md'>";
        $outcome .= '<div class="flex justify-between items-center flex-col md:flex-row mb-4">';
        $outcome .= "<h2 class='text-4xl'>" . $post->getTitle()."</h2></div>";
        $outcome .= "<p class='text-2xl mb-2'>".date_format($date,"d/m/y")." - By ".$post->getAuthor()."</p>";
        $outcome .= "<p>".substr($post->getContent(), 0, 100)."...</p>";
        $outcome .= '<div class="flex justify-center">';
        $outcome .= '<a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="singlePostPage.php?id=' . $post->getId() . '">View Post</a>';
        $outcome .= '</div>';
        $outcome .= '</article>';

        return $outcome;
    }

    static public function displayHomepage(array $posts): string
    {

        $outcome = "<section class='container lg:w-1/2 mx-auto flex flex-col gap-5'>";

         foreach ($posts as $post){
             $outcome .= PostServices::displaySingleHomepage($post);
         }
        $outcome .= '</section>';
         return $outcome;
    }

    static public function displaySinglePost(PostEntity $post): string
    {
        $date = date_create($post->getDateTime());

        $outcome = "<section class='container md:w-1/2 mx-auto'>";
        $outcome .= "<article class='p-8 border border-solid rounded-md'>";
        $outcome .= "<div class='flex justify-between items-center flex-col md:flex-row mb-4'>";
        $outcome .= "<h2 class='text-4xl'>" . $post->getTitle() . "</h2>";
        $outcome .= "</div>";
        $outcome .= "<p class='text-2xl mb-10'>" . date_format($date,"d/m/y");

        if ($post->getAuthor() == '') {
            $outcome .= " - By Anonymous</p>";
        } else {
            $outcome .= " - By " . $post->getAuthor() . "</p>";
        }

        $outcome .= "<p>" . $post->getContent() . "</p>";
        $outcome .= "<a class='px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm' href='index.php'>View all posts</a>";
        $outcome .= "</article>";
        $outcome .= "</section>";
        return $outcome;
    }
}

