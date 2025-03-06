<?php

declare(strict_types=1);

require_once 'src/Services/AddPostsServices.php';

use PHPUnit\Framework\TestCase;

class AddPostsServicesTest extends TestCase
{
    public function test_validTitle_lengthUnder30():void
    {
        $title = 'titleLength';
        $titleLength = strlen($title);
        $actual = AddPostsServices::validTitle($titleLength);

        $this ->assertTrue($actual);
    }

    public function test_validTitle_lengthOver30():void
    {
        $title = 'titleLengthIsThisTextGoingToBeOver30WhoKnows';
        $titleLength = strlen($title);
        $actual = AddPostsServices::validTitle($titleLength);

        $this ->assertFalse($actual);
    }

    public function test_validContent_lengthUnder50():void
    {
        $content = 'contentLength';
        $contentLength = strlen($content);
        $actual = AddPostsServices::validContent($contentLength);

        $this ->assertFalse($actual);
    }

    public function test_validContent_lengthOver1001():void
    {
        $content = 'ContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPants';
        $contentLength = strlen($content);
        $actual = AddPostsServices::validContent($contentLength);

        $this ->assertFalse($actual);
    }

    public function test_validContent_lengthOver50():void
    {
        $content = 'ContentLengthContentLengthContentLengthContentLengthContentLengthContentLength';
        $contentLength = strlen($content);
        $actual = AddPostsServices::validContent($contentLength);

        $this ->assertTrue($actual);
    }

    public function test_validContent_lengthUnder1001():void
    {
        $content = 'ContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPantsContentLengthIsGoingToBeTheLongestLineYouHaveEverSeenEverInYourWholeEntireLifeHoldOntoYourHatsAndYourPants';
        $contentLength = strlen($content);
        $actual = AddPostsServices::validContent($contentLength);

        $this ->assertTrue($actual);
    }
}