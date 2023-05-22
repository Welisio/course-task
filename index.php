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
            <div class="col-6">
                <form class="pt-3" action="handlers/registration.php" method="POST">
                    <input class="form-control mb-3" name="name" type="text" placeholder="Name">
                    <input class="form-control mb-3" name="surname" type="text" placeholder="Surname">
                    <input class="form-control mb-3" name="age" type="number" placeholder="Age">
                    <select class="form-control mb-3" name="teacher_id">
                        <option value="1">Nicat</option>
                        <option value="2">Mehemmed</option>
                        <option value="3">Larry</option>
                    </select>
                    <input type="submit" class="btn btn-primary" value="Register">
                    <a class="btn btn-primary" href="studentlist.php">To list</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>