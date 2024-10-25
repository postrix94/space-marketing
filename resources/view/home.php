<!doctype html>
<html lang="en" class="h-100" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>Space Marketing</title>
</head>
<body class="h-100">

<?php
if ($message = show_flash_message("error")) {
    require_once VIEW_PATH . "/partials/alert/danger.php";
}

if ($message = show_flash_message("message")) {
    require_once VIEW_PATH . "/partials/alert/success.php";
}
?>

<?php require_once VIEW_PATH . "/partials/nav.php"; ?>

<div class="container h-100">
    <div class="row h-100">
        <div class="col d-flex align-items-center">
            <form class="row g-3" method="POST" action="/create-lead">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" required class="form-control" id="firstName" name="firstName">
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" required class="form-control" id="lastName" name="lastName">
                </div>
                <div class="col-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" required class="form-control" id="phone" name="phone">
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success">Создать</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>