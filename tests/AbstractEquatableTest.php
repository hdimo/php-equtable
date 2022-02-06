<?php


namespace Jkhaled\Equatable\Test;


use Jkhaled\Equatable\AbstractEquatable;
use Jkhaled\Equatable\BadClassException;
use Jkhaled\Equatable\PropertyNotExistException;
use Jkhaled\Equatable\Test\Fixtures\SimpleObject;
use Jkhaled\Equatable\Test\Fixtures\SimpleObject2;
use PHPUnit\Framework\TestCase;

class AbstractEquatableTest extends TestCase
{
    public function testObjectEqualsWhenPropertiesEquals()
    {
        $testId = "123";
        $title = "title";
        $obj1 = (new SimpleObject())
            ->setId($testId)
            ->setTitle($title);

        $obj2 = (new SimpleObject())
            ->setId($testId)
            ->setTitle($title);

        $this->assertTrue($obj1->equalTo($obj2));
        $this->assertFalse($obj1 === $obj2);
    }

    public function testObjectNotEqualsWhenPropertiesAreDifferent()
    {
        $testId = "123";
        $title = "titles";
        $obj1 = (new SimpleObject())
            ->setId($testId)
            ->setTitle($title);

        $obj2 = (new SimpleObject())
            ->setId($testId)
            ->setTitle('diff title');

        $this->assertFalse($obj1->equalTo($obj2));
        $this->assertFalse($obj1 === $obj2);
    }


    /**
     * @throws \Jkhaled\Equatable\BadClassException
     * @throws \Jkhaled\Equatable\PropertyNotExistException
     */
    public function testThrowExceptionIfNotSameClass()
    {

        $testId = "123";
        $title = "title";
        $obj1 = (new SimpleObject())
            ->setId($testId)
            ->setTitle($title);

        $obj2 = new class extends AbstractEquatable {
            private $id;
            private $username;

            public function getProperties(): array
            {
                return ['id', 'username'];
            }
        };

        $this->expectException(BadClassException::class);

        $obj1->equalTo($obj2);

    }

    public function testThrowsProprtyNotExistException()
    {
        $o1 = new SimpleObject2('123', 'test');
        $o2 = new SimpleObject2('123', 'test');
        $this->expectException(PropertyNotExistException::class);
        $o1->equalTo($o2);
    }
}