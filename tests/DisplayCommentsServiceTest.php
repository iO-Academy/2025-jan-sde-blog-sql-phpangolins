<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once 'src/Services/DisplayCommentsService.php';
require_once 'src/Entities/CommentEntity.php';
class DisplayCommentsServiceTest extends TestCase
{
    public function test_DisplayCommentsService_correctContent() : void
    {
        $fakePost = new CommentEntity(
            comment: 'comment one is long enough',
            username: 'username one',
            date: '2020-12-12'
        );
        $fakePostTwo = new CommentEntity(
            comment: 'comment two is long enough',
            username: 'username two',
            date: '2020-01-01'
        );

        $fakePostsArray = [$fakePost, $fakePostTwo];

        $actual = DisplayCommentsService::displayAll($fakePostsArray);

        $this->assertStringContainsString('comment one is long enough', $actual);
        $this->assertStringContainsString('username one', $actual);
        $this->assertStringContainsString('12/12/2020', $actual);
        $this->assertStringContainsString('comment two is long enough', $actual);
        $this->assertStringContainsString('username two', $actual);
        $this->assertStringContainsString('01/01/2020', $actual);

    }
}