<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Kesalahan Server</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .wrapper {
            text-align: center;
        }

        .box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        h1 {

            font-size: 64px;
            margin-top: -2rem;
            color: #e74c3c;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #e0e0e0;
        }

        img {
            margin-top: -2rem;
            height: 16rem;
            width: auto;

        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="box">
            <img src="{{ asset('assets/img/500.png') }}" alt="Error 500" />
            <h1>500</h1>
            <p>Maaf, terjadi kesalahan pada server.</p>
            <p><a href="/">Kembali ke Halaman Utama</a></p>
        </div>
    </div>
</body>

</html>
