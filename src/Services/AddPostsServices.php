<?php

declare(strict_types=1);

class AddPostsServices
{
    static public function validTitle($titleLength): bool
    {
        if ($titleLength > 30) {
            return false;
        }
        return true;
    }

    static public function validContent($contentLength): bool
    {
        if ($contentLength > 1001 || $contentLength < 50) {
            return false;
        }
        return true;
    }
}

