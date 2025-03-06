<?php

declare(strict_types=1);

require_once 'src/Services/RegisterService.php';

use PHPUnit\Framework\TestCase;
class RegisterServiceTest extends TestCase{
    public function testInvalidUsernameLessThan(){

        $username =  "ee";
        $actual = RegisterService::validateUsername($username);

        $this->assertFalse($actual);
    }
    public function testInvalidUsernameMoreThan(){

        $username =  "eeeeeeeeeeeeeeeeeeeeeeeeeeeee";
        $actual = RegisterService::validateUsername($username);

        $this->assertFalse($actual);
    }
    public function testValidUsername(){
        $username = 'Username';
        $actual = RegisterService::validateUsername($username);

        $this->assertTrue($actual);
    }
    public function testInvalidEmail(){
        $email = 'eee.com';
        $actual =RegisterService::validateEmail($email);
        $this->assertFalse($actual);
    }
    public function testValidEmail(){
        $email = 'eee@eee.com';
        $actual =RegisterService::validateEmail($email);
        $this->assertTrue($actual);
    }
    public function testInvalidPasswordLessThan(){
        $password = 'e';
        $actual = RegisterService::validatePassword($password);
        $this->assertFalse($actual);
    }
    public function testInvalidPasswordGreaterThan(){
        $password = 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
        $actual = RegisterService::validatePassword($password);
        $this->assertFalse($actual);
    }
    public function testValidPassword()
    {
        $password = 'eeeeeeeeee';
        $actual = RegisterService::validatePassword($password);
        $this->assertTrue($actual);
    }
}