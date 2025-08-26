<?php
// intersection type

// interface
interface HasBrand
{
    // function
    function getBrand(): string;
}

// interface
interface HasName
{
    function getName(): string;
}

class Car implements HasBrand, HasName
{
    private string $brand;
    private string $name;

    public function __construct(string $brand, string $name)
    {
        $this->brand = $brand;
        $this->name = $name;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

// kasih parameter, hasBandu 4 HasNabe 
function printBrandAndName(HasBrand & HasName $value)
{
    echo $value->getBrand() . "-" . $value->getName() . PHP_EOL;
}

printBrandAndName(new Car("Toyota", "Avanza"));
printBrandAndName(new Car("Honda", "Mobilio"));
