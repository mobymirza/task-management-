<?php

namespace App\Tests\Unit\ValueObject\Board;

use App\Domain\ValueObject\Board\Description;
use PHPUnit\Framework\TestCase;

class DescriptionTest extends TestCase
{

    public function test_description()
    {
        //assert
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Description may not be greater than 200 characters.');
        $text = str_repeat('a', 201);
        //act
        new Description($text);


    }
}
