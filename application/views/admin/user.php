<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User Pemakai Kas Buku</title>
    <style>
        /* Light Theme Styles */
        body {
            background-color: #f8f9fa; /* Light background color */
            color: #495057; /* Dark text for good readability */
            font-family: Arial, sans-serif;
        }

        .main-panel {
            background-color: #ffffff; /* White background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .content-wrapper {
            background-color: #ffffff; /* White background for the content area */
            padding: 20px;
            border-radius: 8px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: #ffffff;
            padding: 20px;
        }

        h4.card-title {
            color: #343a40; /* Dark color for the title */
            font-size: 1.75rem;
            margin-bottom: 20px;
        }

        .btn {
            border-radius: 5px;
            font-weight: bold;
            padding: 8px 16px;
        }

        .btn-outline-primary {
            border: 2px solid #007bff;
            color: #007bff;
            background-color: transparent;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-outline-success {
            border: 2px solid #28a745;
            color: #28a745;
            background-color: transparent;
        }
        .btn-outline-success:hover {
            background-color: #28a745;
            color: #fff;
        }

        .btn-outline-danger {
            border: 2px solid #dc3545;
            color: #dc3545;
            background-color: transparent;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }

        /* Table Styles */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #495057;
        }

        .table thead {
            background-color: #f1f1f1;
            border-bottom: 2px solid #ddd;
        }

        .table th, .table td {
            text-align: left;
            padding: 8px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div class="main-panel col-12">
    <div class="content-wrapper">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div id="menghilang">
                            <?php echo $this->session->flashdata('alert', true); ?>
                        </div>
                        <h4 class="card-title">Data User Pemakai Kas Buku</h4>
                        <a href="<?= site_url('user/tambah') ?>">
                            <button type="button" class="btn btn-outline-primary btn-fw">Tambah User</button>
                        </a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td><?= $user->username; ?></td>
                                            <td><?= $user->nama; ?></td>
                                            <td><?= $user->level; ?></td>
                                            <td>
                                                <div>
                                                    <a href="<?= site_url('user/edit/' . $user->id_user) ?>">
                                                        <button type="button" class="btn btn-outline-success btn-fw">Edit</button>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <a onClick="return confirm('Apakah kamu sungguh ingin menghapusnya?')"
                                                       href="<?= site_url('user/delete/' . $user->id_user) ?>">
                                                        <button type="button" class="btn btn-outline-danger btn-fw">Delete</button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
