<?php

require_once('../core.php');

$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$teacher_id = $_POST['teacher_id'];
$student_id = $_POST['student_id'];

if ((!isset($teacher_id) || empty($teacher_id)) || (!isset($student_id) || empty($student_id)) || (!isset($student_id) || empty($student_id)) || (!isset($name) || empty($name)) && (!isset($surname) || empty($surname)) && (!isset($age) || empty($age))) {
    echo 'Please fill data !';
    header("Refresh: 5; URL=../edit.php?student_id=$student_id");
    die();
}

$innerSqlConditions = "
    `name` = CASE WHEN :name != '' THEN :name ELSE `name` END,
    `surname` = CASE WHEN :surname != '' THEN :surname ELSE `surname` END,
    `age` = CASE WHEN :age != '' THEN :age ELSE `age` END,
    `teacher_id` = CASE WHEN :teacher_id != '' THEN :teacher_id ELSE `teacher_id` END
";

$statement = $pdo->prepare("UPDATE `student` SET $innerSqlConditions WHERE `id` = :student_id");
$statement->bindParam(':name', $name);
$statement->bindParam(':surname', $surname);
$statement->bindParam(':age', $age);
$statement->bindParam(':teacher_id', $teacher_id);
$statement->bindParam(':student_id', $student_id);

if ($statement->execute()) {
    echo "Student's information has been edited";
    header("Location: ../studentlist.php");
} else {
    $errorInfo = $statement->errorInfo();
    echo "Oops, something went wrong ! Error: " . $errorInfo[2];
    header("Refresh: 5; URL=../studentlist.php");
}

?>
