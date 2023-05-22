<?php

require_once('../core.php');

$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$teacher_id = $_POST['teacher_id'];

if ((!isset($name) || empty($surname)) || (!isset($surname) || empty($surname)) || (!isset($age) || empty($age))) {
    echo 'Please fill data !';
    header("Refresh: 5; URL=../index.php");
    die();
}

$statement = $pdo->prepare("INSERT INTO `student` (`name`,`surname`,`teacher_id`,`age`) VALUES (?,?,?,?)");

if ($statement->execute([$name, $surname, $teacher_id, $age])) {
    echo 'Student has beem added successfully';
    header("Location: ../studentlist.php");
} else {
    $errorInfo = $statement->errorInfo();
    echo 'Oops, something went wrong ! Error: ' . $errorInfo[2];
    header("Refresh: 5; URL=../studentlist.php");
}

?>

