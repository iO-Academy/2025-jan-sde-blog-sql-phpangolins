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
}