<?php
$name = $_GET['name'];
$surname = $_GET['surname'];
$age = $_GET['age'];
$teacher_id = $_GET['teacher_id'];
$student_id = $_GET['student_id'];

if ((!isset($teacher_id) || empty($teacher_id)) && (!isset($student_id) || empty($student_id)) && (!isset($name) || empty($name)) && (!isset($surname) || empty($surname)) && (!isset($age) || empty($age))) {
    die('Oops, something went wrong !');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <form class="pt-3" action="handlers/edit.php" method="POST">
                    <input class="form-control mb-3" value="<?= $name ?>" name="name" type="text" placeholder="Name">
                    <input class="form-control mb-3" value="<?= $surname ?>" name="surname" type="text" placeholder="Surname">
                    <input class="form-control mb-3" value="<?= $age ?>" name="age" type="number" placeholder="Age">
                    <select class="form-control mb-3" name="teacher_id">
                        <option value="1" <?= $teacher_id === '1' ? 'selected' : '' ?>>Nicat</option>
                        <option value="2" <?= $teacher_id === '2' ? 'selected' : '' ?>>Mehemmed</option>
                        <option value="3" <?= $teacher_id === '3' ? 'selected' : '' ?>>Larry</option>
                    </select>
                    <input type="submit" class="btn btn-primary" value="Edit">
                    <input type="hidden" name="student_id" value="<?= $_GET['student_id'] ?>">
                    <a href="studentlist.php" class="btn btn-primary">To list</a>
                    <a href="index.php" class="btn btn-primary">To Registration</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>