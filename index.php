<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QLPLXpQ/i3sAVwv7Df4It9s+iMOJMQ7H3GsBs3S8cULB30Djl3SyEQD2o+5hLwf2" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 700px;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .title {
            color: #007bff;
            font-weight: bold;
            font-size: 2.5em;
        }
        .description {
            color: #6c757d;
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .btn-primary, .btn-secondary {
            font-size: 1em;
            padding: 12px 25px;
            border-radius: 50px;
            transition: transform 0.3s, box-shadow 0.3s;
            color: #ffffff !important;
            text-decoration: none !important;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-primary:hover, .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .banner-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Gambar banner -->
    <img src="assets/img/mobil.jpeg" alt="Banner Rental Mobil" class="banner-image">

    <h1 class="title mb-3">Selamat Datang di Rental Mobil</h1>
    <p class="description">
        Temukan berbagai pilihan mobil berkualitas untuk kebutuhan perjalanan Anda.
    </p>
    <a href="form_rental.php" class="btn btn-primary me-2">Sewa Mobil</a>
    <a href="list_rental.php" class="btn btn-secondary">Lihat Daftar Rental</a>
</div>

    <!-- Bootstrap Bundle JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-kV07SoevvJbsc8fHxQFvLlHX65xVwC0gkItu6kzSE+oQ74G73VsyBdRHQWHqqQyo" crossorigin="anonymous"></script>
</body>
</html>
