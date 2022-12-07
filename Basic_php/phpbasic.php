<?php
// Datatypes
//variables 
$name = "Thet Htar Soe";
echo $name;
echo "<br>";

//datatypes
//String
var_dump($name);
echo "<br>";
//Integer
$int = 12;
var_dump($int);
echo "<br>";
//Float
$float = 1.1;
var_dump($float);
echo "<br>";
//Boolean 
$boolean = true;
var_dump($boolean);
echo "<br>";
//Array
$arr = ["one", "two", "three"];
var_dump($arr);
echo "<br>";

//Object
class One
{
    public function getColor()
    {
        echo "red";
    }
}
$obj = new One();
var_dump($obj);
echo "<br>";

//NULL
$forNull = null;
var_dump($forNull);
echo "<br>";

//strings 
$name = "Thet Htar Soe";
echo "strlen = " . strlen($name);
echo "<br>";
echo "str_word_count = " . str_word_count($name);
echo "<br>";
echo "strrev = " . strrev($name);
echo "<br>";
echo "strpos = " . strpos($name, "Htar");
echo "<br>";
echo "str_replace = " . str_replace("Soe", "Chan", $name);
echo "<br>";

//Number
$age = 13;
$price = 13.4;
var_dump(is_int($age));
echo "<br>";
var_dump(is_int($price));
echo "<br>";

//Constants
define("greeting", "hi i am thet htar");
echo greeting;
echo "<br>";

//Math 
echo "min number = " . min(12, 16, 3, 9);
echo "<br>";
echo "max number = " . max(12, 16, 3, 9);
echo "<br>";
echo "random number = " . rand(1, 10);
echo "<br>";
echo "square root = " . sqrt(100);
echo "<br>";
echo "positive number = " . abs(-5);
echo "<br>";
echo "pi value = " . pi();
echo "<br>";

//Arrays 
// Index Array
$fruits = ["mango", "watermelon", "apple", "pineapple"];
var_dump($fruits);
echo "<br>";
//Associated Array
$userData = [
    "name" => "Thet Htar Soe",
    "age" => 23
];
var_dump($userData);
echo "<br>";
//Sorting Arrays
$sortNums = [1, 7, 4, 3, 2];
sort($sortNums);
for ($i = 0; $i < count($sortNums); $i++) {
    echo $sortNums[$i];
};
echo "<br>";
rsort($sortNums);
for ($i = 0; $i < count($sortNums); $i++) {
    echo $sortNums[$i];
};
echo "<br>";

//----------

//Control Structures
//If Statements 
$name = "Thet Htar Soe";
if ($name == "Thet Htar Soe") {
    echo "Yes";
} else {
    echo "No";
}
echo "<br>";

//Switch Statements
switch ($name) {
    case "Thet Htar Soe":
        echo "yes i am";
        break;

    case "Thet Htar":
        echo "no";
        break;

    default:
        echo "pls fill someone";
}
echo "<br>";

//Operators
//Arithmetic Operator => **,%,*,/,+,-,etc
$x = 10;
$y = 5;
echo $x + $y;
echo "<br>";
//Assignment Operator => +=,-=,etc
$x = 100;
$x += 10;
echo $x;
echo "<br>";
//Comparison Operators => ==,===,&&,||,!=etc
$name = "Thet Htar Soe";
if ($name == "Thet Htar Soe" || $name == "Thet Htar") {
    echo "Yes";
} else {
    echo "No";
}
echo "<br>";
//Increasement,Decreasement Operators  => var++,++var
$x = 10;
echo $x++;
echo "<br>";
echo ++$x;
echo "<br>";
//Logical Operators => and,or,xor,!,etc
$x = 11;
if ($x !== 10) {
    echo "yes";
}
echo "<br>";
//String Operators => .,.=
$firstName = "Thet Htar";
$lastName = " Soe";
echo $firstName . $lastName;
echo "<br>";
//Ternary Operators => ?:
$name = "Thet Htar Soe";
$realName = $name ? 'yes' : 'no';
echo $realName;
echo "<br>";
// while loop
$i = 10;
while ($i >= 1) {
    echo $i;
    $i--;
}
echo "<br>";
//for loop
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
echo "<br>";
//for each loop
$arr = ['a', 'b', 'c'];
foreach ($arr as $a) {
    echo $a;
}
echo "<br>";
//do while loop
$i = 1;
do {
    echo $i;
    $i++;
} while ($i <= 10);
echo "<br>";
//Break & Continue
for ($i = 1; $i <= 10; $i++) {
    if ($i == 4) {
        break;
    }
    echo $i;
}
echo "<br>";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 4) {
        continue;
    }
    echo $i;
}
echo "<br>";
//----------

//Functions
function getName($name)
{
    echo $name;
}
getName('Thet Htar Soe');
echo "<br>";


function getNameAge($name, $age)
{
    echo $name, $age;
}
getNameAge('Thet Htar Soe', 23);
echo "<br>";
//----------

// Database Connection
$connection = new PDO("mysql:host=localhost;dbname=students", "root", "000000");
$sql = "select * from student_table";
$data = $connection->query($sql)->fetchAll();
print_r($data);
