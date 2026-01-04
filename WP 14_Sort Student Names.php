<?php
// Create an array of student names
$students = array("Ravi", "Anjali", "Kiran", "Meena", "Arun");

// Display original array
echo "<h2>Original Students List:</h2><br>";
print_r($students);
echo "<br><br>";

// Sort array in ascending order
asort($students);
echo "<h2>Students List Sorted In Ascending Order (asort):</h2><br>";
print_r($students);
echo "<br><br>";

// Sort array in descending order
arsort($students);
echo "<h2>Students List Sorted In Descending Order (arsort):</h2><br>";
print_r($students);
?>