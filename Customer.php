<?php

// enumerations Inheritance
interface SayHello
{
    function sayHello(): string;
}

// enumerations trait
trait IndonesiaGender
{
    // enumerations method
    function inIndonesia(): string
    {
        return match ($this) {
            Gender::Male => "Tuan",
            Gender::Female => "Nyonya",
        };
    }
}

// enumerations 
enum Gender: string implements SayHello // bisa pake tipe data, cuma pake titik dua :
{
    use IndonesiaGender;

        // enum, tipe data yang nilainya terbatas
    case Male = "Mr"; // valuenya juga tipe string
    case Female = "Mrs";

    // enumeration constant
    const Unknown = "Unknown"; // tapi ingat tidak bisa memiliki atribute/property

    // enumerations static method
    static function fromIndonesia(string $value): Gender // balikan value nya Gender
    {
        return match ($value) {
            "Tuan" => Gender::Male,
            "Nyonya" => Gender::Female,
            default => throw new Exception("Unsupported Indonesian Value")
        };
    }

    function sayHello(): string
    {
        return "Hello " . $this->value; // value artinya dari si "Mr/Msr"
    }
}

class Customer
{

    public function __construct(
        public string $id,
        public string $name,
        public ?Gender $gender // Gender = tipe data enum
    ) {}
}

// function sayHello
function sayHello(Customer $customer): string // retrunt nya string
{
    // jika customer = null
    if ($customer->gender == null) {
        // tampilkan helo + name
        return "Hello " . $customer->name;
    } else {
        // tampilkan helo + gender + name
        return "Hello " . $customer->gender->value . "." . $customer->name;
    }
}

// tampilkann di console
var_dump(sayHello(new Customer("1", "Budi", Gender::from("Mr")))); // pake backed enumeritions Gender::from
var_dump(sayHello(new Customer("2", "Shinta", Gender::from("Mrs"))));
var_dump(sayHello(new Customer("2", "Shinta", Gender::tryFrom("Salah"))));

var_dump(Gender::cases()); // dapatkan semua data enum

// enumerations method
var_dump(Gender::Male->sayHello());
var_dump(Gender::Female->sayHello());
var_dump(Gender::Male->inIndonesia());
var_dump(Gender::Female->inIndonesia());

// enumerations static method
var_dump(Gender::fromIndonesia("Tuan"));
var_dump(Gender::fromIndonesia("Nyonya"));
// var_dump(Gender::fromIndonesia("Salah")); // error

// enumerations constant
var_dump(Gender::Unknown);
