Equatable interface for object comparison in PHP.

when we want to compare objects in such a way that == yields incorrect results. 
We often overcome this limitation by implementing a method like equals($other) encapsulating our specialized behaviour. 
This library provides an interface for this.

Installation

```shell script
composer require jkhaled/equatable 
```

usage example : 

```php
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