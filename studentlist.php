<?php
require_once('core.php');

$statement = $pdo->prepare(
    "SELECT student.id, student.name, student.surname, student.age, teacher.name AS teacher_name, teacher.surname AS teacher_surname
    FROM `student`
    LEFT JOIN `teacher`
    ON student.teacher_id = teacher.id;"
);

if (!($statement -> execute())) {
    $errorInfo = $statement->errorInfo();
    die("Oops, something went wrong ! Error: $errorInfo[2]");
}
$students = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Student list</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <tr>
                <th class="col">Name</th>
                <th class="col">Surname</th>
                <th class="col">age</th>
                <th class="col">Teacher's name</th>
                <th class="col">Teacher's surname</th>
                <th class="col"></th>
            </tr>
            <?php foreach ($students as $student) { ?>
            <tr>
                <td><?= $student['name'] ?></td>
                <td><?= $student['surname'] ?></td>
                <td><?= $student['age'] ?></td>
                <td><?= $student['teacher_name'] ?></td>
                <td><?= $student['teacher_surname'] ?></td>
                <td>
                    <a href="edit.php?student_id=<?= $student['id'] ?>" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="handlers/delete.php?student_id=<?= $student['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a class="btn btn-primary" href="index.php">To Registration</a>
    </div>
</body>
</html>