<?php


namespace Jkhaled\Equatable\Test;


use Jkhaled\Equatable\Test\Fixtures\SimpleObject;
use PHPUnit\Framework\TestCase;

class AbstractEquatableTest extends TestCase
{
    public function testObjectEqualsWhenPropertiesEquals()
    {
        $testId = "123";
        $testU = "title";
        $obj1 = (new SimpleObject())
            ->setId($testId)
            ->setTitle('testUser');

        $obj2 = (new SimpleObject())
            ->setId($testId)
            ->setTitle('testUser');

        $this->assertTrue($obj1->equalTo($obj2));
        $this->assertFalse($obj1 === $obj2);
    }

    public function testThrowExceptionIfNotSameClass(){

    }
}