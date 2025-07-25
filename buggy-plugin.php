<?php
function printGrade($marks) {
   
    if (!is_numeric($marks) || $marks < 0 || $marks > 100) {
        echo "Invalid Marks\n";
        return;
    }

   
    if ($marks >= 90 && $marks <= 100) {
        echo "Grade: A\n";
    } elseif ($marks >= 80 && $marks < 90) {
        echo "Grade: B\n";
    } elseif ($marks >= 70 && $marks < 80) {
        echo "Grade: C\n";
    } elseif ($marks >= 60 && $marks < 70) { 
        echo "Grade: D\n";
    } else {
        echo "Grade: F\n";
    }
}

$students = [
    ["name" => "Alice", "score" => 92],
    ["name" => "Bob", "score" => 85],
    ["name" => "Charlie", "score" => 55],
    ["name" => "David", "score" => 103],
    ["name" => "Eve", "score" => null],
    ["name" => "Frank"] 
];

foreach ($students as $student) {
    echo "Student: " . $student["name"] . "\n";
   
    $score = isset($student["score"]) ? $student["score"] : null;
    printGrade($score);
    echo "------------------\n";
}
?>
