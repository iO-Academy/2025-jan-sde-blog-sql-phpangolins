<?php

declare(strict_types=1);

require_once 'src/Services/NavBarService.php';

use PHPUnit\Framework\TestCase;

class NavBarServiceTest extends TestCase
{
    public function test_NavBarService_displaysCreatePost(): void
    {
        session_start();
        $_SESSION['loggedIn'] = true;

        $actual = NavBarService::displayNavBar();

        $this->assertStringContainsString('Create Post', $actual);
    }

    public function test_NavBarService_displaysLoginIfNotLoggedIn(): void
    {
        session_start();
        $_SESSION['loggedIn'] = false;

        $actual = NavBarService::displayNavBar();

        $this->assertStringContainsString('Login', $actual);
    }

    public function test_NavBarService_displaysLoginIfNoSession(): void
    {
        $actual = NavBarService::displayNavBar();

        $this->assertStringContainsString('Login', $actual);
    }
}