<?php


require_once __DIR__ . '/vendor/autoload.php';

class User extends \Jk\Equatable\AbstractEquatable
{
    private $id;
    private $firstname;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;

    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }


    public function getProperties(): array
    {
        return ['id', 'firstname'];
    }
}

$user1 = (new User())
    ->setFirstname('khaled')
    ->setId(111);

$user2 = (new User())
    ->setFirstname('khaled')
    ->setId(111);

var_dump($user1 === $user2); // false
var_dump($user1->equalTo($user2)); // false