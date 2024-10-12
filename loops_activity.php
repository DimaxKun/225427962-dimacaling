<?php

// Activity 12: Reverse a String
$input = readline("Input a word: ");
$temp = "";
$len = strlen($input);

for($i=$len-1; $i>=0; $i--){
    $temp .= $input[$i];
}

echo "Reversed word: " . $temp;

// Activity 10: Prime Number Checker
$num = readline("Input; ");
$isPrime = true;

if ($num < 2){
    $isPrime = false;
} else{
    for($i=2; $i<=sqrt($num); $i++){
        if($num%2==0){
            $isPrime = false;
            break;
        }
    }
}
if($isPrime){
    echo"Prime";
}else{
    echo"Composite";
}

// Activity 9: FizzBuzz Challenge
$num = 50;
for ($i=1; $i<$num; $i++){
    if($i%3==0 && $i%5==0){
        echo "FizzBuzz\n";
    } else if($i%3==0){
        echo "Fizz \n";
    } else if($i%5==0){
        echo "Buzz \n";
    } else{
        echo"$i \n";
    }
}


// Activity 8: Factorial Calculator
$num1 = readline("Input number: ");
$ans = 1;
    for ($i=$num1; $i>=1; $i--){
        $ans *= $i;
    }
    echo "The factorial of " . $num1 . " is: " . $ans;


// Activity 7: Key-Value Pairs with foreach
$Info = array("Name" => "Mohammad", "Age" => 21, "Grade" => 'S+', "City" => "Baguio");
foreach($Info as $key => $pair){
    echo"$key: $pair \n";
}


// Activity 6: Array Iteration with foreach
$movies = array('toy story 1', 'toy story 2', 'toy story 3', 'toy story 4', 'toy story 5');
$num = 0;
foreach($movies as $movie){
    $num++;
    echo $num . ". " . $movie . "\n";
}


// Activity 5: Sum of Numbers
$num1 = 0;
$ans = 0;
    while($num1<100){
        $num1 += 1;
        $ans += $num1;
    }
    echo"The sum of 1-100 is: " . $ans;


// Activity 4: Loop Control with break and continue
$num1 = 0;
    for($i=$num1; $i<10; $i++){
        $num1 += 1;
        if ($num1 == 5){
            continue;
        } else if ($num1 == 9){
            break;
        }
        echo $num1 . " ";
    }


// Activity 3: Multiplication Table
$num1 = 7;
    for($i=1; $i<11; $i++){
        $ans = $num1 * $i;
        echo $num1 . " x " . $i . " = " . $ans . "\n";
    }


// Activity 2: Password Validator
do{
    $input = readline("Input your password: ");
    if ($input == "password123"){
        echo"Access Granted.";
        break;
    }else{
        echo"Access Denied." . "\n";
        continue;
    }
}while(true);


// Activity 1: Number Counter
$num1 = 0;
    while($num1<20){
        $num1 += 1;
        if ($num1%2==0){
            echo $num1 . "\n";
        }
    }

?>