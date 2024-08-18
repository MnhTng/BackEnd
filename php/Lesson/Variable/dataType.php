<?php
// INT
$a = 14;
$b = -1;

echo $a;
echo "<br>";
echo $b;
echo "<br>";
echo "<br>";

// FLOAT
$x = 12.3;
$y = -1.2345;

echo $x;
echo "<br>";
echo $y;
echo "<br>";
echo "<br>";

// STRING
/**
 *? '': chi xuat du lieu dang text
 *? "": variable se duoc convert ra GT truoc khi duoc xuat du lieu
 */
$name = 'MnhTng';
$empty = "";

echo $name;
echo "<br>";
echo $empty;
echo "<br>";
echo "<br>";

// ARRAY
$arr = array(0, 1, 2, 3, 4, 5);
$listPerson = array(
    array(
        'id' => 1,
        'name' => 'MnhTng',
        'age' => 21
    ),
    array(
        'id' => 2,
        'name' => 'Ian',
        'age' => 20
    )
);

echo "<pre>";
echo print_r($arr);
echo print_r($listPerson);
echo "</pre>";
echo "<br>";
echo "<br>";

// BOOLEAN
function Even($x)
{
    if ($x % 2 == 0)
        return true;
    return false;
}

$check = Even($a);
echo $check;
echo "<br>";
echo "<br>";

// OBJECT
class Person
{
    public $name = "MnhTng";
    public $age = 21;
}
$person = new Person();

echo "<pre>";
print_r($person);
echo "</pre>";
echo "<br>";
echo "<br>";

// NULL
$null = null;
echo $null;
echo "<br>";
echo "<br>";
