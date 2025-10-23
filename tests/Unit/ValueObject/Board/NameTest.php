<?php

namespace App\Tests\Unit\ValueObject\Board;

use App\Domain\ValueObject\Board\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{

    public function testNameIsRequired()
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Name is required.');
        //act
        new Name('');

    }
    public function testNameIsLessThan3character()
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Name must be at least 3 characters.');
        //act
        new Name('as');
    }
    public function testNameIsMoreThan50character()
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Name may not be greater than 50 characters.');
        $name = str_repeat('a', 51);

        //act
        new Name($name);
    }
}
