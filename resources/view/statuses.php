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

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>Space Marketing</title>
</head>
<body class="h-100">
<?php require_once VIEW_PATH . "/partials/nav.php"; ?>
<div class="container h-100">
    <div class="row h-100">
        <div class="col">
            <div class="mt-5">

                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-end">
                        <div class="me-2">
                            <label for="start-date" class="form-label">Начальная дата:</label>
                            <input type="text" class="form-control form-control-sm" id="start-date">
                        </div>
                        <div class="me-2">
                            <label for="end-date" class="form-label">Конечная дата:</label>
                            <input type="text" class="form-control form-control-sm" id="end-date">
                        </div>
                        <button id="filter" class="btn btn-sm btn-primary">Выбрать</button>
                    </div>
                </div>
                <table id="statuses" class="display" style="width: 100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Ftd</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="module" src="./js/app.js"></script>
</body>
</html>

