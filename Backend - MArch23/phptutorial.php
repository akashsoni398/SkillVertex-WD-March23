<?php

$username = "Akash soni";


$a = "String";   //string
$b = 23432423;   //integer
$c = true;       //boolean

$ewwerwer;
$fsdsd__223423;
$____3234dsdsf;
$var_name;

$array1 = ["String",243324,true,["array"]];   //indexvalue
$array2 = ["Name"=>"Akash","Age"=>26,"qualified"=>true,"Marks"=>["Science"=>23,43,32]];    //key-value pair

echo $array1[0];
echo $array2['Marks']['Science'];

//output 

echo $a,$b,$c;
echo print($a.$b.$c);

//branching stmts - if, ifelse, else if, switch
$age = 13; //app that verifies if im eligible to drive or get a DL
$dl=false;
if($age>=18 && $dl==false) {
    echo "Eligible to get a DL";
}
else if($dl==true) {
    echo "Eligible to drive";
}
else if($age>65 && $dl==true) {
    echo "Eligible for DL retest";
}
else {
    echo "Not eligible to drive";
}

//converts grade to marks
$grade = 'Q';
switch($grade) {
    case 'A+':
        echo "Marks range between 95 to 100";
        break;
    case 'A':
        echo "Marks range between 85 to 95";
        break;
    case 'B+':
        echo "Marks range between 75 to 85";
        break;
    case 'B':
        echo "Marks range between 65 to 75";
        break;
    case 'C':
        echo "Marks range between 55 to 65";
        break;
    case 'D':
        echo "Marks range between 40 to 55";
        break;
    case 'F':
        echo "Marks range below 40";
        break;
    default:
        echo "Grade written does not exist";
}

//looping stmts - while, for, do...while

$i=10001;
while($i<=50) {
    if($i%2!=0) {
        echo $i,'<br>';
    }
    $i++;
}

for($i=0;$i<=50;$i++) {
    if($i%2!=0) {
        echo $i,'<br>';
    }
}


$i=10001;
do {
    if($i%2!=0) {
        echo $i,'<br>';
    }
    $i++;
}
while($i<=50);


$array1 = ["String",243324,true]; 
foreach($array1 as $value) {
    echo $value,"<br>";
}

for($i=0;$i<count($array1);$i++) {
    echo $array1[$i];
}

//loop control
for($i=10;$i>=0;$i--) {
    if($i==5) {
        continue;
    }
    echo '<br>',$i;
}

$a=10;
$b='10';

if($a===$b || $a===10) {
    echo "a equals b";
} else {
    echo "a not equals b";
}
echo $a+$b;

//operators
$a=10;
$a=$a+10;   
$a+=10;

session_start();
$_SESSION['username']="Akash Soni";
//functions

function add($a,$b) {
    $l=20;
    $l++;
    static $s=1;
    $s++;
    echo $l;
    return $a+$b;
}
echo $l;
$sum = add(40,50);

echo password_hash("Akash1998",PASSWORD_BCRYPT);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Welcome <?php echo $username ?></p>
    <form method="POST" action="welcome.php">
        <input type="email" name="email" />
        <input type="password" name="pwd" />
        <button type="submit">SUBMIT</button>
    </form>
</body>
</html>