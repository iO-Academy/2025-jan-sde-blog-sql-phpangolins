<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'src/services/PostServices.php';
require_once 'src/entities/PostEntity.php';

class PostServicesTest extends TestCase{

    public function testDisplaySingleHomepage(){
    $post = new PostEntity(
        1,
        'Title',
        'Author',
        'It is a long established fact that a reader will be distracted by the readable content of a page whe Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
        '2025-08-08 00:00:00',
        5,
        5,
        'Category',
        'Category 2');

    $method = PostServices::displaySingleHomepage($post);

        $this->assertStringContainsString('Title', $method);
        $this->assertStringContainsString('Author', $method);
        $this->assertStringContainsString('It is a long established fact that a reader will be distracted by the readable content of a page ', $method);
        $this->assertStringContainsString('08/08/25', $method);
       }

       public function testDisplayHomepage(){
        $post1 =new PostEntity(
            title: 'Title 1',
        );

        $post2 =new PostEntity(
            title: 'Title 2',
        );
         $posts = [$post1, $post2];

         $method = PostServices::displayHomepage($posts);

         $this->assertStringContainsString('Title 1', $method);
         $this->assertStringContainsString('Title 2', $method);
       }

    public function test_validTitle_lengthUnder30(): void
    {
        $title = 'titleLength';
        $titleLength = strlen($title);
        $actual = PostServices::validTitle($titleLength);

        $this ->assertTrue($actual);
    }

    public function test_validTitle_lengthOver30(): void
    {
        $title = 'titleLengthIsThisTextGoingToBeOver30WhoKnows';
        $titleLength = strlen($title);
        $actual = PostServices::validTitle($titleLength);

        $this ->assertFalse($actual);
    }

    public function test_validContent_lengthUnder50(): void
    {
        $content = 'contentLength';
        $contentLength = strlen($content);
        $actual = PostServices::validContent($contentLength);

        $this ->assertFalse($actual);
    }

    public function test_validContent_lengthOver1001(): void
    {
        $content = 'ContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPants';
        $contentLength = strlen($content);
        $actual = PostServices::validContent($contentLength);

        $this ->assertFalse($actual);
    }

    public function test_validContent_lengthOver50(): void
    {
        $content = 'ContentLengthContentLengthContentLengthContentLengthContentLengthContentLength';
        $contentLength = strlen($content);
        $actual = PostServices::validContent($contentLength);

        $this ->assertTrue($actual);
    }

    public function test_validContent_lengthUnder1001(): void
    {
        $content = 'ContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPants';
        $contentLength = strlen($content);
        $actual = PostServices::validContent($contentLength);

        $this ->assertTrue($actual);
    }
}