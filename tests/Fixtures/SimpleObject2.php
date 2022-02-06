<?php


namespace Jkhaled\Equatable\Test\Fixtures;


use Jkhaled\Equatable\AbstractEquatable;

class SimpleObject2 extends AbstractEquatable
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $title;

    public function __construct(string $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function getProperties(): array
    {
        return ['id', 'description'];
    }
}