<?php
require_once 'src/entities/PostEntity.php';
class PostServices
{

    static public function displaySingleHomepage(PostEntity $post):string{

        $date = date_create($post->getDateTime());
        $outcome = '';

        $outcome .= "<article class='p-8 border border-solid rounded-md'>";
        $outcome .= '<div class="flex justify-between items-center flex-col md:flex-row mb-4">';
        $outcome .= "<h2 class='text-4xl'>" . $post->getTitle()."</h2></div>";
        $outcome .= "<p class='text-2xl mb-2'>".date_format($date,"Y/m/d")." - By ".$post->getAuthor()."</p>";
        $outcome .= "<p>".substr($post->getContent(), 0, 100)."</p>";
        $outcome .= '<div class="flex justify-center">';
        $outcome .= '</div>';
        $outcome .= '</article>';

        return $outcome;
    }



static public function displayHomepage(array $posts):string{

    $outcome = "<section class='container lg:w-1/2 mx-auto flex flex-col gap-5'>";

     foreach ($posts as $post){
         $outcome .= PostServices::displaySingleHomepage($post);
     }

    $outcome .= '</section>';
     return $outcome;
}

}