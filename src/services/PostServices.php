<?php
require_once 'src/entities/PostEntity.php';
class PostServices
{

    static public function displaySingleHomepage(PostEntity $post):string{
        $outcome = '';

        $outcome .= "<article class='p-8 border border-solid rounded-md'>";
//        $outcome .= '<span class="px-3 py-2 bg bg-slate-200 inline-block mb-4 rounded-sm">Science and Nature</span>';
        $outcome .= '<div class="flex justify-between items-center flex-col md:flex-row mb-4">';
        $outcome .= "<h2 class='text-4xl'>" . $post->getTitle()."</h2>";
//        $outcome .= "<span class='text-xl'>100 likes - 50 dislikes</span></div>";
        $outcome .= "<p class='text-2xl mb-2'>".$post->getDateTime()."-".$post->getAuthor()."</p>";
        $outcome .= "<p>Lorem ipsum dolor sit amet, consectetur efficitur, Lorem ipsum dolor sit amet, consectetur efficitur...</p>";
        $outcome .= '<div class="flex justify-center">';
//        $outcome .= "<a class='px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm' href='singlePost.php'>View post</a>";
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