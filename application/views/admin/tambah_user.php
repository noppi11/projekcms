<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <style>
        /* Light Theme Styles */
        body {
            background-color: #f8f9fa; /* Light background color for the body */
            color: #495057; /* Dark text color for readability */
            font-family: Arial, sans-serif;
        }

        .main-panel {
            background-color: #ffffff; /* White background for the main panel */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* White background for the card */
        }

        .card-body {
            padding: 20px;
        }

        h4.card-title {
            color: #343a40; /* Dark color for the title */
            font-size: 1.75rem;
            margin-bottom: 20px;
        }

        p.card-description {
            color: #6c757d; /* Light gray color for description text */
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 1rem;
            color: #495057;
        }

        .form-control {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #007bff; /* Blue border color on focus */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        select.form-control {
            padding: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-dark:hover {
            background-color: #23272b;
            border-color: #1d2124;
        }

        footer.footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            margin-top: 30px;
        }

        footer.footer span {
            color: #6c757d;
        }

        footer.footer a {
            color: #007bff;
        }

    </style>
</head>
<body>

<div class="main-panel">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Input Data</h4>
                <p class="card-description">Silahkan Masukkan Data</p>
                <form class="forms-sample" action="<?= base_url('user/simpan')?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputName1">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Level</label>
                        <select class="form-control" name="level">
                            <option>Kontributor</option>
                            <option>Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
    </div>
</footer>

</body>
</html>
