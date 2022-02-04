<?php

namespace Jkhaled\Equatable\Test\Fixtures;

use Jkhaled\Equatable\AbstractEquatable;

require_once __DIR__ . '/../../src/AbstractEquatable.php';

class SimpleObject extends AbstractEquatable
{
    private $id;
    private $title;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getProperties(): array
    {
        return ['id', 'username'];
    }
}