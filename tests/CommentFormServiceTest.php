<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once 'src/Services/CommentFormService.php';

class CommentFormServiceTest extends TestCase
{
    public function test_displayForm_correctTags() : void
    {
        $tagOne = "<section";
        $tagTwo = '<form method="post"';
        $tagThree = '<textarea';
        $tagFour = 'name="comment_content"';
        $tagFive = '<input';
        $tagSix = 'type="submit"';

        $actual = CommentFormService::displayForm();

        $this->assertStringContainsString($tagOne, $actual);
        $this->assertStringContainsString($tagTwo, $actual);
        $this->assertStringContainsString($tagThree, $actual);
        $this->assertStringContainsString($tagFour, $actual);
        $this->assertStringContainsString($tagFive, $actual);
        $this->assertStringContainsString($tagSix, $actual);

    }

    public function test_validateCommentContent_returnTrue() : void
    {
        $input = 'this should return true';
        $actual = CommentFormService::validateCommentContent($input);
        $this->assertTrue($actual);
    }

    public function test_validateCommentContent_returnFalse() : void
    {
        $input = 'a';
        $actual = CommentFormService::validateCommentContent($input);
        $this->assertFalse($actual);
    }

    public function test_validateCommentContent_over200chars() : void
    {
        $input = 'A shimmering dragonfly, perched on a dew-kissed fern, 
        watched a ladybug tumble down a vibrant poppy. Distant train whistles echoed, 
        a lonely symphony against the rustling leaves and the gentle murmur of a hidden stream.';
        $actual = CommentFormService::validateCommentContent($input);
        $this->assertFalse($actual);
    }

    public function test_successMessage_correctMessage() : void
    {
        $actual = CommentFormService::successMessage();
        $this->assertStringContainsString('Your comment has been posted successfully.', $actual);
    }

    public function test_errorMessage_correctMessage() : void
    {
        $actual = CommentFormService::errorMessage();
        $this->assertStringContainsString('Your comment could not be posted. <br /> Your comment was under 10 characters or over 200 characters', $actual);
    }
}