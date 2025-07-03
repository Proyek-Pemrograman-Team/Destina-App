<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Wisata - Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    html,
    body {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    body {
        display: flex;
    }

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        background: #E1EEBC;
        width: 200px;
        padding-top: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .sidebar a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #333;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: #c6d99c;
        color: #000;
        border-left: 6px solid #00D107;
    }

    .main-content {
        margin-left: 200px;
        flex: 1;
        padding: 20px;
        background: #f9f9f9;
        min-height: 100vh;
    }

    .btn.add {
        background-color: #00D107;
        color: white;
        margin: 15px 0;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ccc;
        vertical-align: top;
    }

    th {
        background-color: #E1EEBC;
    }

    .btn.edit {
        background-color: #FFD93D;
        color: black;
        font-weight: bold;
    }

    .btn.delete {
        background-color: #FF3E3E;
        color: white;
        font-weight: bold;
    }

    .section-divider {
        border-top: 2px solid #ccc;
        margin: 20px 0;
    }
</style>

<body>
    <div class="sidebar">
        <img src="../Asset/Logo.png" alt="Destina Logo">
        <a href="#">User</a>
        <a href="data.php" class="active">Data</a>
    </div>

    <div class="main-content">
        <h1>Data Wisata</h1>
        <a href="../php/logout.php" class="btn logout">Logout</a>
        <div class="section-divider"></div>
        <a href="add.html" class="btn add">+ Data Wisata</a>
        <div class="section-divider"></div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                Show
                <select class="form-select d-inline-block w-auto">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="🔍 Search" style="max-width: 250px;">
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="data-wisata-body">
                    <!-- Data wisata akan dimuat di sini -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script dynamic render -->
    <script>
        fetch('../php/get_wisata.php')
            .then(res => res.json())
            .then(data => {
                const tbody = document.getElementById('data-wisata-body');
                tbody.innerHTML = ''; // bersihkan sebelumnya

                data.forEach((item, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
            <td>${index + 1}.</td>
            <td>${item.nama}</td>
            <td>${item.deskripsi.substring(0, 100)}...</td>
            <td><a href="${item.gmap_link}" target="_blank">${item.gmap_link}</a></td>
            <td>
            <a href="edit.html?id=${item.id}" class="btn edit">Edit</a>
            <button class="btn delete" onclick="confirmDelete(${item.id})">Hapus</button>
            </td>
            `;
                    tbody.appendChild(row);
                });
            });
    </script>

    <!-- Konfirmasi hapus -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `../php/admin_delete.php?id=${id}`;
                }
            })
        }
    </script>
</body>

</html>