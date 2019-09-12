<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
    <div class="container-fluid bg-light">
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-end">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="./">Icon</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" href="insert.php">Thêm </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display.php">Update</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="display.php">Delete</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="upload-file.php">Uplate files </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sub-search">Search</button>
                </form>
            </div>
        </nav>
    </div>