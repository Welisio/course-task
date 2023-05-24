<?php

require_once('../core.php');

$student_id = $_GET['student_id'];

$studentCheck = $pdo->prepare("SELECT * FROM `student` WHERE `id` = ?");
$studentCheck->execute([$student_id]);

if ($studentCheck -> rowCount() === 0) {
    header("Refresh: 5; URL=../studentlist.php");
    die('No such student');
}

if (!isset($student_id) || empty($student_id)) {
    echo 'Please fill data !';
    header("Refresh: 5; URL=../studentlist.php");
    die();
}

$statement = $pdo->prepare("DELETE FROM `student` WHERE `id` = ?");

if($statement->execute([$student_id])) {
    echo 'Student has been deleted successfully';
    header("Location: ../studentlist.php");
} else {
    $errorMessage = $statement->errorMessage();
    echo "Oops, something went wrong ! Error: " . $errorInfo[2];
    header("Refresh: 5; URL=../studentlist.php");
}