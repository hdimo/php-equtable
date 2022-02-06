[![PHP UNIT](https://github.com/hdimo/php-equtable/actions/workflows/php.yml/badge.svg)](https://github.com/hdimo/php-equtable/actions/workflows/php.yml)

An equatable interface for object comparison in PHP.

when we want to compare objects in php with == yields incorrect results even if they are equal in all properties.
this library provides an interface to compare two objects by returning their properties and checks if they are equal.

Installation

```shell script
composer require jkhaled/equatable 
```

usage example : 

```php
require_once __DIR__ . '/vendor/autoload.php';

class User extends \Jkhaled\Equatable\AbstractEquatable
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

    // the properties to be compared to check equality
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
var_dump($user1->equalTo($user2)); // true 
```