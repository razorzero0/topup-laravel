<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Sedang Dalam Pemeliharaan</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .box {

            background-color: #fff;
            padding: 20px;
            padding-top: 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {

            font-size: 62px;
            color: #333;

        }

        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            color: #2980b9;
        }

        img {

            height: 16rem;
            width: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="box">
            <img src="{{ asset('assets/img/503.png') }}" />
            <h1>503</h1>

            <p>Maaf, kami sedang melakukan pemeliharaan.</p>

            <p><a href="/">Coba lagi nanti!</a></p>
        </div>
    </div>
</body>

</html>
