<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Berita</title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
    <style>
        body {
        line-height: 1;
        font-size: 100%;
        font-family: 'Open Sans', sans-serif;
        color: #5a5a5a;
        }

        /* Header */
        .header {
            background: white;
            padding: 30px;
            text-align: left;
        }

        .header h2 {
            color: #b5b5b5;
            margin: 0;
            font-size: 29px;
            font-weight: bold;
            padding-left: 15px;
        }

        /* Navbar */
        .navbar {
            background: #2b83ea;
            padding: 10px 15px;
            display: flex;
            gap: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }

        .navbar a:hover, .navbar a.active {
            background: #1f5faa;
        }

        /* Container */
        .container {
            width: 95%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #2b83ea;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:nth-child(odd) {
            background: white;
        }

        /* Buttons */
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
        }

        .btn-danger {
            background: red;
            color: white;
            border-radius: 4px;
            border: none;
        }

        .btn-primary {
            background: gray;
            color: white;
            border-radius: 4px;
            border: none;
        }

        /* Footer */
        .footer {
            background: black;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Admin Portal Berita</h2>
</div>

<div class="navbar">
    <a href="<?= base_url('/admin/artikel'); ?>" class="<?= (current_url() == base_url('/admin/artikel')) ? 'active' : ''; ?>">Dashboard</a>
    <a href="<?= base_url('/admin/artikel'); ?>" class="<?= (current_url() == base_url('/admin/artikel')) ? 'active' : ''; ?>">Artikel</a>
    <a href="<?= base_url('/admin/artikel/add'); ?>" class="<?= (current_url() == base_url('/admin/artikel/add')) ? 'active' : ''; ?>">Tambah Artikel</a>
</div>

<div class="container">