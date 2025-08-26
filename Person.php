<?php

class Person
{

    public function __construct(public string $name) {}

    function sayHello(string $name): string
    {
        return "Hello $name, my name is $this->name";
    }
}

$person = new Person("Nabil");

$reference = $person->sayHello(...); // ambil function dengan titik-3 ...

var_dump($reference("Hariano"));

// $reference2 = str_contains(...);